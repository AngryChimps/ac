<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class AdCollectionBase extends NormBaseCollection {
    protected static $tableName = 'ad';
    protected static $singularClassName = 'Ad';
    protected static $primaryKeyFieldNames = array('ad_key');
    protected static $primaryKeyPropertyNames = array('adKey');
    protected static $autoIncrementFieldName = '';
}