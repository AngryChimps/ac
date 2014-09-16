<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class LocationCollectionBase extends NormBaseCollection {
    protected static $tableName = 'location';
    protected static $singularClassName = 'Location';
    protected static $primaryKeyFieldNames = array('location_key');
    protected static $primaryKeyPropertyNames = array('locationKey');
    protected static $autoIncrementFieldName = '';
}