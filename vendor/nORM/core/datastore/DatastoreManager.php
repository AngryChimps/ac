<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 6/19/14
 * Time: 10:05 AM
 */

namespace norm\core\datastore;


use Doctrine\DBAL\DriverManager;
use norm\config\Config;
use norm\core\NormBaseObject;
use \Doctrine\DBAL\Configuration;
use \norm\core\datastore\MysqlTableDatastore;

class DatastoreManager {
    /** @var \norm\core\datastore\AbstractDatastore[] */
    protected static $_datastores = array();

    /** @var \doctrine\DBAL\Connection[] */
    protected static $_referenceDbs = array();

    /**
     * @param $datastoreName string
     * @return AbstractDatastore
     */
    public static function getDatastore($datastoreName) {
        if(!array_key_exists($datastoreName, self::$_datastores)) {
            $configParams = Config::$datastores[$datastoreName];

            switch($configParams['driver']) {
                case 'mysql':
                    self::$_datastores[$datastoreName] = new MysqlPdoDatastore($configParams);
                    break;

                case 'redis_blob':
                    self::$_datastores[$datastoreName] = new RedisBlobDatastore($configParams);
                    break;

                case 'redis_hash':
                    self::$_datastores[$datastoreName] = new RedisHashDatastore($configParams);
                    break;
            }
        }

        return self::$_datastores[$datastoreName];
    }

    /**
     * @param $realm
     * @return AbstractDatastore
     */
    public static function getReferenceDatastore($realm) {
        if(!array_key_exists($realm, self::$_referenceDbs)) {
            $configParams = Config::$realms[$realm]['referenceDatastore'];

            switch($configParams['driver']) {
                case 'mysql':
                    self::$_referenceDbs[$realm] = new MysqlPdoDatastore($configParams);
                    break;
            }
        }

        return self::$_referenceDbs[$realm];
    }

//    /**
//     * @param $realm
//     * @return \doctrine\DBAL\Connection
//     */
//    public static function getReferenceDb($realm) {
//        if(!array_key_exists($realm, self::$_referenceDbs)) {
//            $configParams = Config::$realms[$realm]['referenceDatastore'];
//            $config = new Configuration();
//
//            switch($configParams['driver']) {
//                case 'pdo_mysql':
//                    self::$_referenceDbs[$realm] = DriverManager::getConnection($configParams, $config);
//                    break;
//            }
//        }
//
//        return self::$_referenceDbs[$realm];
//    }

    public static function getReferenceDbType($realm) {
        return Config::$realms[$realm]['referenceDatastore']['driver'];
    }
}