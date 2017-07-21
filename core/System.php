<?php

namespace Core;

class System{

    private $controllerIntance;

    public function run(){

        $router = new Router();

        $controllerIntance = new $router->getController();
        $reflectionMethod = new ReflectionMethod($router->getController(), $router->getAction());
        $reflectionMethod->invokeArgs($controllerIntance, $router->getParams());
        


    }

}
