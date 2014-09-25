<?php

namespace norm\realms\db/base;

use norm\core\NormBaseCollection;

class AdFlagCollectionBase extends NormBaseCollection {
    protected static $tableName = 'ad_flag';
    protected static $singularClassName = 'AdFlag';
    protected static $primaryKeyFieldNames = array('ad_key', 'author_key');
    protected static $primaryKeyPropertyNames = array('adKey', 'authorKey');
    protected static $autoIncrementFieldName = '';
}