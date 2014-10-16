<?php

namespace norm\test\realms\_riak\base;

use norm\core\NormBaseCollection;

class CommentCollectionBase extends NormBaseCollection {
    protected static $tableName = 'comment';
    protected static $singularClassName = 'Comment';
    protected static $primaryKeyFieldNames = array('comment_key');
    protected static $primaryKeyPropertyNames = array('commentKey');
    protected static $autoIncrementFieldName = '';
}