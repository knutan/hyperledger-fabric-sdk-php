<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: peer/configuration.proto

namespace Hyperledger\Fabric\Protos\Peer;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * AnchorPeers simply represents list of anchor peers which is used in ConfigurationItem
 *
 * Generated from protobuf message <code>protos.AnchorPeers</code>
 */
class AnchorPeers extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .protos.AnchorPeer anchor_peers = 1;</code>
     */
    private $anchor_peers;

    public function __construct() {
        \GPBMetadata\Peer\Configuration::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>repeated .protos.AnchorPeer anchor_peers = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAnchorPeers()
    {
        return $this->anchor_peers;
    }

    /**
     * Generated from protobuf field <code>repeated .protos.AnchorPeer anchor_peers = 1;</code>
     * @param \Hyperledger\Fabric\Protos\Peer\AnchorPeer[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAnchorPeers($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Hyperledger\Fabric\Protos\Peer\AnchorPeer::class);
        $this->anchor_peers = $arr;

        return $this;
    }

}
