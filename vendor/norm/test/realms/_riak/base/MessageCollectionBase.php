<?php

namespace norm\test\realms\_riak\base;

use norm\core\NormBaseCollection;

class MessageCollectionBase extends NormBaseCollection {
    protected static $realm = '_riak';
    protected static $tableName = 'message';
    protected static $singularClassName = 'Message';
    protected static $primaryKeyFieldNames = array('message_key');
    protected static $primaryKeyPropertyNames = array('messageKey');
    protected static $autoIncrementFieldName = '';
}