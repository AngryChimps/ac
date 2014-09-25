<?php

namespace norm\realms\db/base;

use norm\core\NormBaseCollection;

class MemberCollectionBase extends NormBaseCollection {
    protected static $tableName = 'member';
    protected static $singularClassName = 'Member';
    protected static $primaryKeyFieldNames = array('member_key');
    protected static $primaryKeyPropertyNames = array('memberKey');
    protected static $autoIncrementFieldName = '';
}