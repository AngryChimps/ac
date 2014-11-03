<?php


namespace norm\test\realms\mysql;

use norm\core\NormBaseObject;
use norm\test\AbstractMysqlTestCase;
use norm\test\realms\_mysql\Company;
use norm\test\realms\_mysql\Person;
use norm\test\realms\_mysql\Address;

require_once(__DIR__ . "/../../../../core/autoload.php");

class PersonTest extends AbstractMysqlTestCase {

    /**
     * @depends AddressTest::saveAddress
     * @return Person
     */
    public static function getNewTestPerson() {
        $addr = AddressTest::getNewTestAddressAfterSaving();
        $p = new Person();
        $p->addressId = $addr->id;
        $p->name = 'Person Name';

        return $p;
    }

    /**
     * @depends getNewTestPerson
     * @return Person
     */
    public static function getNewTestPersonAfterSaving() {
        $p = self::getNewTestPerson();
        $p->save();
        return $p;
    }

    public function testLoadMother() {
        //Create two people, a child and a mother
        $p1 = self::getNewTestPersonAfterSaving();
        $p2 = self::getNewTestPersonAfterSaving();

        //Assign the mother
        $p1->motherId = $p2->id;
        $p1->save();

        //Clear the local cache so everything is a fresh read
        NormBaseObject::invalidateAll();

        //Reload $p1 and then load its mother
        $child = Person::getByPk($p1->id);

    }

 }
 