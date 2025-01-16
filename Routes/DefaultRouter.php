<?php
    include 'Routes\..\global.php';

    require_once BASE_URL . '\Controllers\IndexController.php';
    require_once BASE_URL . '\Controllers\ProductController.php';
    require_once BASE_URL . '\Controllers\UserController.php';
    require_once BASE_URL . '\Routes\Router.php';
    session_start();
    $url = str_replace("/car/", "", $_SERVER['REQUEST_URI']);

    if(strlen($url) != 0 && $url[strlen($url)-1] == "/"){
        $url = substr_replace($url, '', -1);
    }
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
    
