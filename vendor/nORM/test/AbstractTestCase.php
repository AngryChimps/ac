<?php


namespace norm\test;


use PHPUnit_Extensions_Database_DataSet_IDataSet;
use PHPUnit_Extensions_Database_DB_IDatabaseConnection;
use norm\config\Config;

require_once '../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';

abstract class AbstractTestCase extends \PHPUnit_Extensions_Database_TestCase {
     // only instantiate pdo once for test clean-up/fixture load
    static private $pdo = null;

    // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
    private $conn = null;

    /**
     * Returns the test database connection.
     *
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    final public function getConnection()
    {
        $configParams = Config::$testDb;
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new \PDO('mysql:dbname=' . $configParams['dbname'] . ';host=' . $configParams['host']
                    . ';' . $configParams['port'], $configParams['user'], $configParams['password']);
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $configParams['dbname']);
        }

        return $this->conn;
    }

    /**
     * Returns the test dataset.
     *
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet()
    {
        return $this->createMySQLXMLDataSet(__DIR__ . '/test_data.xml');
    }

    protected function setUp() {
        $conn=$this->getConnection();
        $conn->getConnection()->query("set foreign_key_checks=0");
        parent::setUp();
        $conn->getConnection()->query("set foreign_key_checks=1");
    }

    protected function tearDown()
    {
        $conn=$this->getConnection();
        $conn->getConnection()->query("set foreign_key_checks=0");
        parent::tearDown(); // TODO: Change the autogenerated stub
        $conn->getConnection()->query("set foreign_key_checks=1");
    }

} 