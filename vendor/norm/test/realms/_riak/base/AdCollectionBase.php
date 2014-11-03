<?php

namespace norm\test\realms\_riak\base;

use norm\core\NormBaseCollection;

class AdCollectionBase extends NormBaseCollection {
    protected static $realm = '_riak';
    protected static $tableName = 'ad';
    protected static $singularClassName = 'Ad';
    protected static $primaryKeyFieldNames = array('ad_key');
    protected static $primaryKeyPropertyNames = array('adKey');
    protected static $autoIncrementFieldName = '';
}