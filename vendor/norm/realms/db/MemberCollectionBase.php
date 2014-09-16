<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class MemberCollectionBase extends NormBaseCollection {
    protected static $tableName = 'member';
    protected static $singularClassName = 'Member';
    protected static $primaryKeyFieldNames = array();
    protected static $primaryKeyPropertyNames = array();
    protected static $autoIncrementFieldName = '';
}