<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: common/policies.proto

namespace Hyperledger\Fabric\Protos\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Policy expresses a policy which the orderer can evaluate, because there has been some desire expressed to support
 * multiple policy engines, this is typed as a oneof for now
 *
 * Generated from protobuf message <code>common.Policy</code>
 */
class Policy extends \Google\Protobuf\Internal\Message
{
    /**
     * For outside implementors, consider the first 1000 types reserved, otherwise one of PolicyType
     *
     * Generated from protobuf field <code>int32 type = 1;</code>
     */
    private $type = 0;
    /**
     * Generated from protobuf field <code>bytes value = 2;</code>
     */
    private $value = '';

    public function __construct() {
        \GPBMetadata\Common\Policies::initOnce();
        parent::__construct();
    }

    /**
     * For outside implementors, consider the first 1000 types reserved, otherwise one of PolicyType
     *
     * Generated from protobuf field <code>int32 type = 1;</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * For outside implementors, consider the first 1000 types reserved, otherwise one of PolicyType
     *
     * Generated from protobuf field <code>int32 type = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkInt32($var);
        $this->type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes value = 2;</code>
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Generated from protobuf field <code>bytes value = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, False);
        $this->value = $var;

        return $this;
    }

}

