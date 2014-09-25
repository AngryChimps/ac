<?php


namespace AngryChimps\AcBundle\classes;


class Member {
    public $key;
    public $email;
    public $password;
    public $first;
    public $last;
    public $dob;
    public $photo;
    public $address;
    public $lat;
    public $long;

    public $blocked_company_ids = array();
    public $managed_company_ids = array();
} 