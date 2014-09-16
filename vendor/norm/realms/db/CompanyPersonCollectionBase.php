<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class CompanyPersonCollectionBase extends NormBaseCollection {
    protected static $tableName = 'company_person';
    protected static $singularClassName = 'CompanyPerson';
    protected static $primaryKeyFieldNames = array('company_id', 'person_id', 'company_id', 'person_id');
    protected static $primaryKeyPropertyNames = array('companyId', 'personId', 'companyId', 'personId');
    protected static $autoIncrementFieldName = '';
}