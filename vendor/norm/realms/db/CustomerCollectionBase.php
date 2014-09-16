<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class CustomerCollectionBase extends NormBaseCollection {
    protected static $tableName = 'customer';
    protected static $singularClassName = 'Customer';
    protected static $primaryKeyFieldNames = array('person_id', 'person_id');
    protected static $primaryKeyPropertyNames = array('personId', 'personId');
    protected static $autoIncrementFieldName = '';
}