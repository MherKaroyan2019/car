<?php
    class Router{
        protected $routes = [];

        public function addRoute($route, $controller, $action = 'index'){
            $this->routes[$route] = ['controller' => $controller, 'action' => $action];
        }

        public function dispatch(){
            $uri = substr(strtok($_SERVER['REQUEST_URI'], '?'), 11);
            if(array_key_exists($uri, $this->routes)){
                $controller = $this->routes[$uri]['controller'];
                $action = $this->routes[$uri]['action'];

                $controller = new $controller();
                $controller->$action();
            } else {
                throw new \Exception("No route found for URI: $uri");
            }
        }
    }
?>