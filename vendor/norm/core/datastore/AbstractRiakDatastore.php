<?php


namespace norm\core\datastore;


abstract class AbstractRiakDatastore extends AbstractDatastore {
    /** @var \Riak\Connection  */
    public $connection;

    /** @var \Riak\Bucket[] */
    protected $buckets = array();

    public function __construct($configParams) {
        $this->connection = new \Riak\Connection($configParams['host'], $configParams['port']);
    }

    protected function _getBucketName($tablename) {
        return '||norm||' . $tablename;
    }

    /**
     * @param $tablename
     * @return \Riak\Bucket
     */
    protected function getBucket($tablename) {
        if(!isset($this->buckets[$tablename])) {
            $this->buckets[$tablename] = new \Riak\Bucket($this->connection, $this->_getBucketName($tablename));
        }

        return $this->buckets[$tablename];
    }
}