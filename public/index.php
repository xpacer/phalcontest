<?php

use PhalconTest\Constants\HttpStatusCodes;
use Phalcon\Mvc\Micro;


error_reporting(E_ALL);

try {
    $app = new Micro();

    /**
     * Include Loader to load directories and namespaces
     */
    include __DIR__ . "/../app/config/loader.php";

    /**
     * Include routes
     */
    include __DIR__ . "/../app/routes/v1.php";

    $app->notFound(function () use ($app) {
        $app->response->setStatusCode(404, HttpStatusCodes::getMessage(404))->sendHeaders();
        $app->response->setContentType('application/json');
        $app->response->setJsonContent([
            'status' => 'error',
            'message' => 'Endpoint not found/implemented!'
        ]);
        $app->response->send();
    });

    $app->handle();

} catch (\Exception $e) {

    $app->response->setStatusCode(500, HttpStatusCodes::getMessage(500))->sendHeaders();
    $app->response->setContentType('application/json');
    $app->response->setJsonContent([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
    $app->response->send();
}
