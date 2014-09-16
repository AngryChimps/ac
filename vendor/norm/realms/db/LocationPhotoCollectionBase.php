<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class LocationPhotoCollectionBase extends NormBaseCollection {
    protected static $tableName = 'location_photo';
    protected static $singularClassName = 'LocationPhoto';
    protected static $primaryKeyFieldNames = array('id', 'id');
    protected static $primaryKeyPropertyNames = array('id', 'id');
    protected static $autoIncrementFieldName = 'id';
}