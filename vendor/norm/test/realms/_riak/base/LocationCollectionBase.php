<?php

namespace norm\test\realms\_riak\base;

use norm\core\NormBaseCollection;

class LocationCollectionBase extends NormBaseCollection {
    protected static $realm = '_riak';
    protected static $tableName = 'location';
    protected static $singularClassName = 'Location';
    protected static $primaryKeyFieldNames = array('location_key');
    protected static $primaryKeyPropertyNames = array('locationKey');
    protected static $autoIncrementFieldName = '';
}