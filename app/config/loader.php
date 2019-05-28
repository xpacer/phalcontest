<?php

use Phalcon\Loader;

$loader = new Loader();

$loader->registerDirs(
    [
        realpath(__DIR__ . '/../controllers/v1/'),
        realpath(__DIR__ . '/../models/'),
        realpath(__DIR__ . '/../constants/')
    ]
);

$loader->registerNamespaces([
    'PhalconTest\V1\Controllers' => realpath(__DIR__ . '/../controllers/v1/'),
    'PhalconTest\Models' => realpath(__DIR__ . '/../models/'),
    'PhalconTest\Constants' => realpath(__DIR__ . '/../constants/')
]);

$loader->register();