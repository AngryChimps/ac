<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class MessageFlagCollectionBase extends NormBaseCollection {
    protected static $tableName = 'message_flag';
    protected static $singularClassName = 'MessageFlag';
    protected static $primaryKeyFieldNames = array('id', 'id');
    protected static $primaryKeyPropertyNames = array('id', 'id');
    protected static $autoIncrementFieldName = 'id';
}