<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class AddressBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'address';

    /** @var string[] */
    protected static $fieldNames = array('id', 'street', 'city', 'state', 'zip', 'zip4');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'varchar', 'varchar', 'varchar', 'int', 'int');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'street', 'city', 'state', 'zip', 'zip4');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('id', 'id');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('id', 'id');

    /** @var  string[] */
    protected static $autoIncrementFieldName = 'id';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = 'id';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = false;

    /** @var int */
    public $id;

    /** @var varchar */
    public $street;

    /** @var varchar */
    public $city;

    /** @var varchar */
    public $state;

    /** @var int */
    public $zip;

    /** @var int */
    public $zip4;



}