<?php


namespace PhalconTest\V1\Controllers;


use Phalcon\Mvc\Controller;

class TestController extends Controller
{
    public function hello()
    {
        return json_encode([
            "data" => "Hello World"
        ]);
    }
}