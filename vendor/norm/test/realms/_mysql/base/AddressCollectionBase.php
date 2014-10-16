<?php

namespace norm\test\realms\_mysql\base;

use norm\core\NormBaseCollection;

class AddressCollectionBase extends NormBaseCollection {
    protected static $tableName = 'address';
    protected static $singularClassName = 'Address';
    protected static $primaryKeyFieldNames = array('id');
    protected static $primaryKeyPropertyNames = array('id');
    protected static $autoIncrementFieldName = 'id';
}