<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: peer/transaction.proto

namespace Hyperledger\Fabric\Protos\Peer;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * ChaincodeEndorsedAction carries information about the endorsement of a
 * specific proposal
 *
 * Generated from protobuf message <code>protos.ChaincodeEndorsedAction</code>
 */
class ChaincodeEndorsedAction extends \Google\Protobuf\Internal\Message
{
    /**
     * This is the bytes of the ProposalResponsePayload message signed by the
     * endorsers.  Recall that for the CHAINCODE type, the
     * ProposalResponsePayload's extenstion field carries a ChaincodeAction
     *
     * Generated from protobuf field <code>bytes proposal_response_payload = 1;</code>
     */
    private $proposal_response_payload = '';
    /**
     * The endorsement of the proposal, basically the endorser's signature over
     * proposalResponsePayload
     *
     * Generated from protobuf field <code>repeated .protos.Endorsement endorsements = 2;</code>
     */
    private $endorsements;

    public function __construct() {
        \GPBMetadata\Peer\Transaction::initOnce();
        parent::__construct();
    }

    /**
     * This is the bytes of the ProposalResponsePayload message signed by the
     * endorsers.  Recall that for the CHAINCODE type, the
     * ProposalResponsePayload's extenstion field carries a ChaincodeAction
     *
     * Generated from protobuf field <code>bytes proposal_response_payload = 1;</code>
     * @return string
     */
    public function getProposalResponsePayload()
    {
        return $this->proposal_response_payload;
    }

    /**
     * This is the bytes of the ProposalResponsePayload message signed by the
     * endorsers.  Recall that for the CHAINCODE type, the
     * ProposalResponsePayload's extenstion field carries a ChaincodeAction
     *
     * Generated from protobuf field <code>bytes proposal_response_payload = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setProposalResponsePayload($var)
    {
        GPBUtil::checkString($var, False);
        $this->proposal_response_payload = $var;

        return $this;
    }

    /**
     * The endorsement of the proposal, basically the endorser's signature over
     * proposalResponsePayload
     *
     * Generated from protobuf field <code>repeated .protos.Endorsement endorsements = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getEndorsements()
    {
        return $this->endorsements;
    }

    /**
     * The endorsement of the proposal, basically the endorser's signature over
     * proposalResponsePayload
     *
     * Generated from protobuf field <code>repeated .protos.Endorsement endorsements = 2;</code>
     * @param \Hyperledger\Fabric\Protos\Peer\Endorsement[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setEndorsements($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Hyperledger\Fabric\Protos\Peer\Endorsement::class);
        $this->endorsements = $arr;

        return $this;
    }

}

