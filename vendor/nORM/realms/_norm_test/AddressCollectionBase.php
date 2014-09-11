<?php

namespace norm\realms\_norm_test;

use norm\core\NormBaseCollection;

class AddressCollectionBase extends NormBaseCollection {
    protected static $tableName = 'address';
    protected static $singularClassName = 'Address';
    protected static $primaryKeyFieldNames = array('id', 'id');
    protected static $primaryKeyPropertyNames = array('id', 'id');
    protected static $autoIncrementFieldName = 'id';
}