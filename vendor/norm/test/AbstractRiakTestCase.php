<?php


namespace norm\test;


use norm\test\config\Config;

require_once '../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';

abstract class AbstractRiakTestCase extends AbstractTestCase {
    const PREFIX = '__norm';
    const REALM = '_riak';

    /** @var \Riak\Connection  */
    private static $conn = null;

    /*
     * Returns the test database connection.
     *
     * @return \Riak\Connection
     */
    final public function getConnection()
    {
        if(self::$conn === null) {
            $realm = Config::$realms[self::REALM];
            $datastoreConfig = Config::$datastores[$realm['defaultPrimaryDatastore']];
            self::$conn = new \Riak\Connection($datastoreConfig['host'], $datastoreConfig['port']);
        }

        return self::$conn;
    }

    final public function getObjectsBucket($tablename) {
        $bucketName = self::PREFIX . ':' . self::REALM . ':' . $tablename . ':objects';
        return new \Riak\Bucket($this->getConnection(), $bucketName);
    }
}