<?php
    require_once __DIR__ . '\..\Controllers\IndexController.php';
    require_once __DIR__ . '\..\Router.php';

    $router = new Router();

    $router->addRoute('/', IndexController::class, 'index');

    $router->dispatch();
?>