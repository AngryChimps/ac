<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class CommentCollectionBase extends NormBaseCollection {
    protected static $tableName = 'comment';
    protected static $singularClassName = 'Comment';
    protected static $primaryKeyFieldNames = array('id', 'id');
    protected static $primaryKeyPropertyNames = array('id', 'id');
    protected static $autoIncrementFieldName = 'id';
}