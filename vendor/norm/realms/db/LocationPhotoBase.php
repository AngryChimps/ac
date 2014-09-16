<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class LocationPhotoBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'location_photo';

    /** @var string[] */
    protected static $fieldNames = array('id', 'location_id', 'photo_filename', 'position', 'created_at');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'string', 'int', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'locationId', 'photoFilename', 'position', 'createdAt');

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

    /** @var int */
    public $locationId;

    /** @var string */
    public $photoFilename;

    /** @var int */
    public $position;

    /** @var DateTime */
    public $createdAt;


    /** @returns \norm\realms\db\Location */
    public function getLocation() {
        if($this->Location === null) {
            $this->loadLocation();
        }
        return $this->Location;
    }


    protected function loadLocation() {
        parent::loadProperty('Location', 'location', 'id');
    }




    /**
     * @param $pk
     * @return LocationPhoto
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return LocationPhoto
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return LocationPhoto
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}