<?php

use Wes\Mvc\Controllers\DefaultController;
use Wes\Mvc\Routes\Router;

$router = new Router();
$router->get('/', DefaultController::class, 'index');
$router->get('/edit', DefaultController::class, 'edit');
$router->post('/save', DefaultController::class, 'save');
$router->post('/delete', DefaultController::class, 'delete');

try {
    $router->analyse();
} catch (Exception $e) {
    error_log($e->getMessage());
    echo $e->getMessage();
}