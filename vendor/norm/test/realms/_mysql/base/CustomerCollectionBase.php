<?php

namespace norm\test\realms\_mysql\base;

use norm\core\NormBaseCollection;

class CustomerCollectionBase extends NormBaseCollection {
    protected static $realm = '_mysql';
    protected static $tableName = 'customer';
    protected static $singularClassName = 'Customer';
    protected static $primaryKeyFieldNames = array('person_id');
    protected static $primaryKeyPropertyNames = array('personId');
    protected static $autoIncrementFieldName = '';
}