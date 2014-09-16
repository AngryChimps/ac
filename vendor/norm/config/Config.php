<?php

namespace norm\config;

class Config {

    public static $realms = array(
        'db' => array(
            'referenceDatastore' => array(
                'driver' => 'mysql',
                'dbname' => 'ac',
                'host' => 'localhost',
                'port' => 3379,
                'user' => 'root',
                'password' => '',
            ),
//            'tablePrefix' => '',
//            'defaultStorageEngine' => 'innodb',
//            'defaultCollation' => 'utf8',
            'defaultPrimaryDatastore' => 'mt',
            'defaultCacheDatastore' => null,
        ),
        '_norm_test' => array(
            'referenceDatastore'  => array(
                'driver' => 'mysql',
                'dbname' => 'norm',
                'host' => 'localhost',
                'port' => 3379,
                'user' => 'root',
                'password' => '',
            ),
//            'tablePrefix' => '',
//            'defaultStorageEngine' => 'innodb',
//            'defaultCollation' => 'utf8',
            'defaultPrimaryDatastore' => '_norm_test_mt',
            'defaultCacheDatastore' => null,
        ),
    );

    /***
     * @var array
     */
    public static $datastores = array (
        'mt' => array(
            'driver' => 'mysql',
            'dbname' => 'ac',
            'host' => 'localhost',
            'port' => 3379,
            'user' => 'root',
            'password' => '',
//                'persistentConnection' => true,
//                'tablePrefix' => '',
//                'defaultStorageEngine' => 'innodb',
//                'defaultCollation' => 'utf8',
        ),
        '_norm_test_mt' => array(
            'driver' => 'mysql',
            'dbname' => 'norm',
            'host' => 'localhost',
            'port' => 3379,
            'user' => 'root',
            'password' => '',
//                'persistentConnection' => true,
//                'tablePrefix' => '',
//                'defaultStorageEngine' => 'innodb',
//                'defaultCollation' => 'utf8',
        ),
       'rh' => array(
//            'databaseNumber' => 0,
            'datastoreType' => 'redis_hash',
            'hostname' => '127.0.0.1',
            'port' => 1234,
//            'password' => null,
//            'key_prefix' => 'norm_',
        ),
/*        'rb' => array(
            'databaseNumber' => 0,
            'datastoreType' => 'redis_blob',
            'hostname' => '127.0.0.1',
            'port' => 1234,
            'password' => null,
            'ttl' => null,
            'key_prefix' => 'norm_',
        ),
     */

    );

    public static $testDb = array (
        'driver' => 'mysql',
        'dbname' => 'norm',
        'host' => 'localhost',
        'port' => 3379,
        'user' => 'root',
        'password' => '',
    );


    /**
     * Do not edit below...
     */


}
