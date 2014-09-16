<?php


namespace norm\test\realms\_norm_test;

use norm\core\NormBaseObject;
use norm\realms\_norm_test\Company;
use norm\realms\_norm_test\Person;
use norm\realms\_norm_test\Address;
use norm\test\AbstractTestCase;

require_once("../core/autoload.php");

class PersonTest extends AbstractTestCase {

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
        $mother = $child->
    }

 }
 