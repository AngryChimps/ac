<?php

namespace norm\test\config;

class Config {

    public static $realms = array(
        '_riak' => array(
            'defaultPrimaryDatastore' => '__norm_test_riak',
            'defaultCacheDatastore' => null,
        ),
        '_mysql' => array(
            'defaultPrimaryDatastore' => '__norm_test_mysql',
            'defaultCacheDatastore' => null,
        ),
    );

    /***
     * @var array
     */
    public static $datastores = array (
        '__norm_test_riak' => array(
            'driver' => 'riak_blob',
            'host' => 'localhost',
            'port' => 8087
        ),
        '__norm_test_mysql' => array(
            'driver' => 'mysql',
            'dbname' => 'norm_test',
            'host' => 'localhost',
            'port' => 3379,
            'user' => 'root',
            'password' => '',
//                'persistentConnection' => true,
//                'tablePrefix' => '',
//                'defaultStorageEngine' => 'innodb',
//                'defaultCollation' => 'utf8',
        ),

    );


    /**
     * Do not edit below...
     */


}
