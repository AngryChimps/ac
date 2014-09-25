<?php

namespace norm\config;

class Config {

    public static $realms = array(
        'riak' => array(
            'defaultPrimaryDatastore' => 'riak',
            'defaultCacheDatastore' => null,
        ),
        'mysql' => array(
            'defaultPrimaryDatastore' => 'mysql',
            'defaultCacheDatastore' => null,
        ),
    );

    /***
     * @var array
     */
    public static $datastores = array (
        'riak' => array(
            'driver' => 'riak',
            'host' => 'localhost',
            'port' => 8087
        ),
        'mysql' => array(
            'driver' => 'mysql',
            'dbname' => '_norm_test',
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
