<?php
    require_once __DIR__ . '\..\Controllers\IndexController.php';
    require_once __DIR__ . '\..\Controllers\ProductController.php';
    require_once __DIR__ . '\..\Controllers\UserController.php';
    require_once __DIR__ . '\Router.php';
    session_start();
    $url = str_replace("/car/", "", $_SERVER['REQUEST_URI']);
    $par = explode('/', $url);
    
    switch(count($par)){
        case 1:
            if($par[0]){
                $uc = ucfirst($par[0]) . 'Controller';
                $controller = new $uc();
                $controller->index();
            }else{
                $controller = new IndexController();
                $controller->index(); 
            }
        break;
        case 2:
            $uc = ucfirst($par[0]) . 'Controller';
            $controller = new $uc();
            $controller->{$par[1]}();
        break;
        case 3:
            $uc = ucfirst($par[0]) . 'Controller';
            $controller = new $uc;
            $controller->{$par[1]}($par[2]);
        break;
        case 4:
            $uc = ucfirst($par[0])  . 'Controller';
            $controller = new $uc;
            $controller->{$par[1]}($par[2], $par[3]);
        break;
    }
    die();    
    session_start();
    
