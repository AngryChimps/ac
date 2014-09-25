<?php

namespace norm\realms\mysql/base;

use norm\core\NormBaseCollection;

class CompanyPersonCollectionBase extends NormBaseCollection {
    protected static $tableName = 'company_person';
    protected static $singularClassName = 'CompanyPerson';
    protected static $primaryKeyFieldNames = array('company', 'person');
    protected static $primaryKeyPropertyNames = array('company', 'person');
    protected static $autoIncrementFieldName = '';
}