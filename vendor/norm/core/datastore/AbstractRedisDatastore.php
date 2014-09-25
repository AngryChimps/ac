<?php


namespace norm\core\datastore;


abstract class AbstractRedisDatastore extends AbstractDatastore {
    /** @var \Redis  */
    public $connection;


} 