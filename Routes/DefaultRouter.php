<?php
    require_once __DIR__ . '\..\Controllers\IndexController.php';
    require_once __DIR__ . '\Router.php';
    
    session_start();

    $router = new Router();

    if($name == "index"){
        $router->addRoute("/", IndexController::class, $name);
    }else{
        $router->addRoute("/$file", IndexController::class, $name);
    }   

    $router->dispatch();
?>