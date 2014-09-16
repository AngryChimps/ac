<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class MemberPreferencesCollectionBase extends NormBaseCollection {
    protected static $tableName = 'member_preferences';
    protected static $singularClassName = 'MemberPreferences';
    protected static $primaryKeyFieldNames = array('member_id', 'member_id');
    protected static $primaryKeyPropertyNames = array('memberId', 'memberId');
    protected static $autoIncrementFieldName = '';
}