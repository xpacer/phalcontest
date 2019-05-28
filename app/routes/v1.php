<?php

use Phalcon\Mvc\Micro\Collection as MicroCollection;

$test = new MicroCollection();
$test->setHandler('PhalconTest\V1\Controllers\TestController', true);
$test->setPrefix('/v1/test');
$test->get('/hello', 'hello');

$app->mount($test);