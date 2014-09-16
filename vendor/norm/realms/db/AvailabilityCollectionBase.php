<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class AvailabilityCollectionBase extends NormBaseCollection {
    protected static $tableName = 'availability';
    protected static $singularClassName = 'Availability';
    protected static $primaryKeyFieldNames = array('id', 'id');
    protected static $primaryKeyPropertyNames = array('id', 'id');
    protected static $autoIncrementFieldName = 'id';
}