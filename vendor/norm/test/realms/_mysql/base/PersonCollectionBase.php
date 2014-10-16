<?php

namespace norm\test\realms\_mysql\base;

use norm\core\NormBaseCollection;

class PersonCollectionBase extends NormBaseCollection {
    protected static $tableName = 'person';
    protected static $singularClassName = 'Person';
    protected static $primaryKeyFieldNames = array('id');
    protected static $primaryKeyPropertyNames = array('id');
    protected static $autoIncrementFieldName = '';
}