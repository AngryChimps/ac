<?php
use \norm\core\generator\Generator;

if($argc < 2) {
    exit('Invalid arguments');
}

require_once '../core/autoload.php';

set_include_path('.:../vendor/doctrine/common/lib:../vendor/doctrine/dbal/lib');

$generator = new Generator();

switch($argv[1]) {
    case 'generate':
        $generator->generate($argv[2]);
        break;

    case 'dump_schema':
        $generator->dump_schema($argv[2]);
        break;

    case 'generate_test':
        $generator->generate_tests('mysql');
        $generator->generate_tests('riak');
        break;
    case 'test':
        system("../vendor/bin/phpunit --verbose /home/user/www/vendor/norm/test");
        break;
}