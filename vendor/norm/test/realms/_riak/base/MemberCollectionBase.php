<?php

namespace norm\test\realms\_riak\base;

use norm\core\NormBaseCollection;

class MemberCollectionBase extends NormBaseCollection {
    protected static $tableName = 'member';
    protected static $singularClassName = 'Member';
    protected static $primaryKeyFieldNames = array('key');
    protected static $primaryKeyPropertyNames = array('key');
    protected static $autoIncrementFieldName = '';
}