<?php

namespace norm\realms\_norm_test;

use norm\core\NormBaseCollection;

class PersonCollectionBase extends NormBaseCollection {
    protected static $tableName = 'person';
    protected static $singularClassName = 'Person';
    protected static $primaryKeyFieldNames = array('id', 'id');
    protected static $primaryKeyPropertyNames = array('id', 'id');
    protected static $autoIncrementFieldName = 'id';
}