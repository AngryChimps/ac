<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class TypesCollectionBase extends NormBaseCollection {
    protected static $tableName = 'types';
    protected static $singularClassName = 'Types';
    protected static $primaryKeyFieldNames = array('id', 'id');
    protected static $primaryKeyPropertyNames = array('id', 'id');
    protected static $autoIncrementFieldName = 'id';
}