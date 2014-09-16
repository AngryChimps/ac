<?php
require_once('Address.php');
require_once('../core/Utils.php');

$tries = $argv[1];

/** @var \PDO $pdo */
$pdo = new \PDO('mysql:dbname=norm;host=localhost', 'root', '');

$time = microtime(true);

for($i = 0; $i < $tries; $i++) {
    $stmt = $pdo->prepare('SELECT * FROM address LIMIT 1');
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, '\norm\pdo_test\Address');
    $stmt->fetch();
}

echo 'FETCH_CLASS: ' . ( microtime(true) - $time) . " seconds\n";






$time = microtime(true);

for($i = 0; $i < $tries; $i++) {
    $stmt = $pdo->prepare('SELECT * FROM address LIMIT 1');
    $stmt->execute();
    $address = new \norm\pdo_test\Address();
    while($row = $stmt->fetch()) {
        foreach($row as $name=>$value) {
            $address->$name = $value;
        }
    }
}

echo 'FETCH_ASSOC: ' . ( microtime(true) - $time) . " seconds\n";



$time = microtime(true);

for($i = 0; $i < $tries; $i++) {
    $stmt = $pdo->prepare('SELECT * FROM address LIMIT 1');
    $stmt->execute();
    $address = new \norm\pdo_test\Address();
    while($row = $stmt->fetch()) {
        foreach($row as $name=>$value) {
            $prop = \norm\core\Utils::field2property($name);
            $address->$prop = $value;
        }
    }
}

echo 'FETCH_ASSOC: ' . ( microtime(true) - $time) . " seconds\n";

