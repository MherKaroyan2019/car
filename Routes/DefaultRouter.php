<?php
    require_once __DIR__ . '\..\Controllers\IndexController.php';
    require_once __DIR__ . '\..\Controllers\ProductController.php';
    require_once __DIR__ . '\..\Controllers\UserController.php';
    require_once __DIR__ . '\Router.php';
    
    session_start();

    $router = new Router();

    $controller;

    if($name == "index"){
        $controller = IndexController::class;
    }else if($name == "product" || $name == "add"){
        $controller = ProductController::class;
    }else{
        $controller = UserController::class;
    }

    if($name == "index"){
        $router->addRoute("/", $controller, $name);
    }else{
        $router->addRoute("/$file", $controller, $name);
    }   

    
    $router->dispatch();
?>