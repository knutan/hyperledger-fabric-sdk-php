<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: peer/chaincode_shim.proto

namespace Hyperledger\Fabric\Protos\Peer;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protos.GetQueryResult</code>
 */
class GetQueryResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string query = 1;</code>
     */
    private $query = '';

    public function __construct() {
        \GPBMetadata\Peer\ChaincodeShim::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>string query = 1;</code>
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Generated from protobuf field <code>string query = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setQuery($var)
    {
        GPBUtil::checkString($var, True);
        $this->query = $var;

        return $this;
    }

}

