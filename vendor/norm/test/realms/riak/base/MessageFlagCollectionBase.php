<?php

namespace norm\realms\riak/base;

use norm\core\NormBaseCollection;

class MessageFlagCollectionBase extends NormBaseCollection {
    protected static $tableName = 'message_flag';
    protected static $singularClassName = 'MessageFlag';
    protected static $primaryKeyFieldNames = array('message_key', 'author_key');
    protected static $primaryKeyPropertyNames = array('messageKey', 'authorKey');
    protected static $autoIncrementFieldName = '';
}