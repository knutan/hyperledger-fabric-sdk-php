<?php

/**
 * Copyright 2017 American Express Travel Related Services Company, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express
 * or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

declare(strict_types=1);

namespace AmericanExpress\HyperledgerFabricClient;

use AmericanExpress\HyperledgerFabricClient\Channel\Channel;
use AmericanExpress\HyperledgerFabricClient\Channel\ChannelInterface;
use AmericanExpress\HyperledgerFabricClient\Channel\ChannelProviderInterface;
use AmericanExpress\HyperledgerFabricClient\Exception\RuntimeException;
use AmericanExpress\HyperledgerFabricClient\Header\HeaderGeneratorInterface;
use AmericanExpress\HyperledgerFabricClient\Peer\Peer;
use AmericanExpress\HyperledgerFabricClient\Peer\PeerFactoryInterface;
use AmericanExpress\HyperledgerFabricClient\Peer\PeerOptionsInterface;
use AmericanExpress\HyperledgerFabricClient\Peer\UnaryCallResolver;
use AmericanExpress\HyperledgerFabricClient\Proposal\ProposalProcessorInterface;
use AmericanExpress\HyperledgerFabricClient\Peer\UnaryCallResolverInterface;
use AmericanExpress\HyperledgerFabricClient\Proposal\ResponseCollection;
use AmericanExpress\HyperledgerFabricClient\Signatory\SignatoryInterface;
use AmericanExpress\HyperledgerFabricClient\Transaction\TransactionOptions;
use AmericanExpress\HyperledgerFabricClient\Identity\SerializedIdentityAwareHeaderGenerator;
use AmericanExpress\HyperledgerFabricClient\User\UserContextInterface;
use Hyperledger\Fabric\Protos\Peer\Proposal;
use Hyperledger\Fabric\Protos\Peer\SignedProposal;

final class Client implements ChannelProviderInterface, ProposalProcessorInterface
{
    /**
     * @var UserContextInterface
     */
    private $user;

    /**
     * @var PeerFactoryInterface
     */
    private $peerFactory;

    /**
     * @var SignatoryInterface
     */
    private $signatory;

    /**
     * @var ChannelInterface[]
     */
    private $channels = [];

    /**
     * @var SerializedIdentityAwareHeaderGenerator
     */
    private $headerGenerator;

    /**
     * @var UnaryCallResolverInterface
     */
    private $unaryCallResolver;

    /**
     * Client constructor.
     * @param UserContextInterface $user
     * @param SignatoryInterface $signatory
     * @param PeerFactoryInterface $peerFactory
     * @param HeaderGeneratorInterface $headerGenerator
     * @param UnaryCallResolverInterface|null $unaryCallResolver
     */
    public function __construct(
        UserContextInterface $user,
        SignatoryInterface $signatory,
        PeerFactoryInterface $peerFactory,
        HeaderGeneratorInterface $headerGenerator,
        UnaryCallResolverInterface $unaryCallResolver = null
    ) {
        $this->user = $user;
        $this->signatory = $signatory;
        $this->peerFactory = $peerFactory;
        $this->headerGenerator = new SerializedIdentityAwareHeaderGenerator(
            $this->user->getIdentity(),
            $headerGenerator
        );
        $this->unaryCallResolver = $unaryCallResolver ?: new UnaryCallResolver();
    }

    /**
     * @param string $name
     * @return ChannelInterface
     */
    public function getChannel(string $name): ChannelInterface
    {
        if (!\array_key_exists($name, $this->channels)) {
            $this->channels[$name] = new Channel(
                $name,
                $this,
                $this->headerGenerator,
                $this->user->getOrganization()->getPeers()
            );
        }

        return $this->channels[$name];
    }

    /**
     * @param Proposal $proposal
     * @param TransactionOptions|null $options
     * @return ResponseCollection
     */
    public function processProposal(
        Proposal $proposal,
        TransactionOptions $options
    ): ResponseCollection {
        $privateKey = $this->user->getOrganization()->getPrivateKey();

        $signedProposal = $this->signatory->signProposal($proposal, new \SplFileObject($privateKey));

        return $this->processSignedProposal($signedProposal, $options);
    }

    /**
     * The SignedProposal instances is asynchronously transmitted to Peers. This method
     * waits until all Responses are collected and returns the ResponseCollection.
     *
     * Each Response in the Collection wraps a ProposalResponse upon success, or an Exception upon failure.
     *
     * @param SignedProposal $proposal
     * @param TransactionOptions|null $options
     * @return ResponseCollection
     * @throws RuntimeException
     */
    private function processSignedProposal(
        SignedProposal $proposal,
        TransactionOptions $options
    ): ResponseCollection {
        if (!$options->hasPeers()) {
            throw new RuntimeException('Could not determine peers for this transaction');
        }

        $peerOptionsCollection = $options->getPeers();

        // Create collection of peers.
        $peers = \array_map(function (PeerOptionsInterface $peerOptions) {
            return $this->peerFactory->fromPeerOptions($peerOptions);
        }, $peerOptionsCollection);

        // Convert peers into asynchronous calls.
        $calls = \array_map(function (Peer $peer) use ($proposal) {
            return $peer->processSignedProposal($proposal);
        }, $peers);

        // Resolve calls to responses.
        return $this->unaryCallResolver->resolveMany(...$calls);
    }
}
