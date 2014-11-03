<?php

namespace norm\test\realms\_mysql\base;

use norm\core\NormBaseCollection;

class CompanyCollectionBase extends NormBaseCollection {
    protected static $realm = '_mysql';
    protected static $tableName = 'company';
    protected static $singularClassName = 'Company';
    protected static $primaryKeyFieldNames = array('id');
    protected static $primaryKeyPropertyNames = array('id');
    protected static $autoIncrementFieldName = 'id';
}