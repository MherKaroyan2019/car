<?php
    require_once __DIR__ . '\..\Controllers\IndexController.php';
    require_once __DIR__ . '\..\Controllers\ProductController.php';
    require_once __DIR__ . '\..\Controllers\UserController.php';
    require_once __DIR__ . '\Router.php';
    
    session_start();

    $router = new Router();

    if($name == "index"){
        $router->addRoute("Product", ProductController::class);
        $router->addRoute("User", UserController::class);
        $router->addRoute("/", IndexController::class, $name);
    }else{
        $router->addRoute("Product", ProductController::class);
        $router->addRoute("User", UserController::class);
        $router->addRoute("/$file", IndexController::class, $name);
    }   

    
    $router->dispatch();
?>