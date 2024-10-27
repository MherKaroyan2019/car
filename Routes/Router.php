<?php
    class Router{
        public $routes = [];

        public function addRoute($route, $controller, $action = 0){
            $this->routes[$route] = ['controller' => $controller, 'action' => $action];
        }

        public function dispatch(){
            $uri = substr(strtok($_SERVER['REQUEST_URI'], '?'), 11);
            if(array_key_exists($uri, $this->routes)){
                foreach ($this->routes as $key => $value) {
                    if(!$value['action']){
                        $controllername = $this->routes[$key]['controller'];
                        global $$controllername;
                        $$controllername = new $controllername();
                    }else{
                        $controller = $this->routes[$uri]['controller'];
                        $action = $this->routes[$uri]['action'];
        
                        $controller = new $controller();
                        $controller->$action($ProductController, $UserController); 
                    }
                }
            } else {
                throw new \Exception("No route found for URI: $uri");
            }
        }
    }
?>