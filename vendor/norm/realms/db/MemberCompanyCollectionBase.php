<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class MemberCompanyCollectionBase extends NormBaseCollection {
    protected static $tableName = 'member_company';
    protected static $singularClassName = 'MemberCompany';
    protected static $primaryKeyFieldNames = array('member_id', 'company_id', 'member_id', 'company_id');
    protected static $primaryKeyPropertyNames = array('memberId', 'companyId', 'memberId', 'companyId');
    protected static $autoIncrementFieldName = '';
}