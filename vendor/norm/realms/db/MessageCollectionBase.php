<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class MessageCollectionBase extends NormBaseCollection {
    protected static $tableName = 'message';
    protected static $singularClassName = 'Message';
    protected static $primaryKeyFieldNames = array('id', 'id');
    protected static $primaryKeyPropertyNames = array('id', 'id');
    protected static $autoIncrementFieldName = 'id';
}