<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: peer/transaction.proto

namespace Hyperledger\Fabric\Protos\Peer;

/**
 * Protobuf enum <code>Protos\TxValidationCode</code>
 */
class TxValidationCode
{
    /**
     * Generated from protobuf enum <code>VALID = 0;</code>
     */
    const VALID = 0;
    /**
     * Generated from protobuf enum <code>NIL_ENVELOPE = 1;</code>
     */
    const NIL_ENVELOPE = 1;
    /**
     * Generated from protobuf enum <code>BAD_PAYLOAD = 2;</code>
     */
    const BAD_PAYLOAD = 2;
    /**
     * Generated from protobuf enum <code>BAD_COMMON_HEADER = 3;</code>
     */
    const BAD_COMMON_HEADER = 3;
    /**
     * Generated from protobuf enum <code>BAD_CREATOR_SIGNATURE = 4;</code>
     */
    const BAD_CREATOR_SIGNATURE = 4;
    /**
     * Generated from protobuf enum <code>INVALID_ENDORSER_TRANSACTION = 5;</code>
     */
    const INVALID_ENDORSER_TRANSACTION = 5;
    /**
     * Generated from protobuf enum <code>INVALID_CONFIG_TRANSACTION = 6;</code>
     */
    const INVALID_CONFIG_TRANSACTION = 6;
    /**
     * Generated from protobuf enum <code>UNSUPPORTED_TX_PAYLOAD = 7;</code>
     */
    const UNSUPPORTED_TX_PAYLOAD = 7;
    /**
     * Generated from protobuf enum <code>BAD_PROPOSAL_TXID = 8;</code>
     */
    const BAD_PROPOSAL_TXID = 8;
    /**
     * Generated from protobuf enum <code>DUPLICATE_TXID = 9;</code>
     */
    const DUPLICATE_TXID = 9;
    /**
     * Generated from protobuf enum <code>ENDORSEMENT_POLICY_FAILURE = 10;</code>
     */
    const ENDORSEMENT_POLICY_FAILURE = 10;
    /**
     * Generated from protobuf enum <code>MVCC_READ_CONFLICT = 11;</code>
     */
    const MVCC_READ_CONFLICT = 11;
    /**
     * Generated from protobuf enum <code>PHANTOM_READ_CONFLICT = 12;</code>
     */
    const PHANTOM_READ_CONFLICT = 12;
    /**
     * Generated from protobuf enum <code>UNKNOWN_TX_TYPE = 13;</code>
     */
    const UNKNOWN_TX_TYPE = 13;
    /**
     * Generated from protobuf enum <code>TARGET_CHAIN_NOT_FOUND = 14;</code>
     */
    const TARGET_CHAIN_NOT_FOUND = 14;
    /**
     * Generated from protobuf enum <code>MARSHAL_TX_ERROR = 15;</code>
     */
    const MARSHAL_TX_ERROR = 15;
    /**
     * Generated from protobuf enum <code>NIL_TXACTION = 16;</code>
     */
    const NIL_TXACTION = 16;
    /**
     * Generated from protobuf enum <code>EXPIRED_CHAINCODE = 17;</code>
     */
    const EXPIRED_CHAINCODE = 17;
    /**
     * Generated from protobuf enum <code>CHAINCODE_VERSION_CONFLICT = 18;</code>
     */
    const CHAINCODE_VERSION_CONFLICT = 18;
    /**
     * Generated from protobuf enum <code>BAD_HEADER_EXTENSION = 19;</code>
     */
    const BAD_HEADER_EXTENSION = 19;
    /**
     * Generated from protobuf enum <code>BAD_CHANNEL_HEADER = 20;</code>
     */
    const BAD_CHANNEL_HEADER = 20;
    /**
     * Generated from protobuf enum <code>BAD_RESPONSE_PAYLOAD = 21;</code>
     */
    const BAD_RESPONSE_PAYLOAD = 21;
    /**
     * Generated from protobuf enum <code>BAD_RWSET = 22;</code>
     */
    const BAD_RWSET = 22;
    /**
     * Generated from protobuf enum <code>ILLEGAL_WRITESET = 23;</code>
     */
    const ILLEGAL_WRITESET = 23;
    /**
     * Generated from protobuf enum <code>INVALID_OTHER_REASON = 255;</code>
     */
    const INVALID_OTHER_REASON = 255;
}

