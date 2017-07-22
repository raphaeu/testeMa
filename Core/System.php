<?php

namespace Core;

use ReflectionMethod;

class System{

    private $controllerIntance;

    public function run(){

        $router = new Router();

        echo "Method: ".$router->getMethod();
        echo "<br>";
        echo "Controller: ".$router->getController();
        echo "<br>";
        echo "Action: ".$router->getAction();
        echo "<br>";
        echo "Parms: ".print_r($router->getParms(),1);
        echo "<br>";
        

        // Carregando informacoes da classe para instanciar
        $controller = $router->getController();
        $action =$router->getAction();
        $parms =$router->getParms();

        // Instanciando classe e setando parametros por reflection
        $this->controllerIntance = new $controller;
        $reflectionMethod = new ReflectionMethod($controller, $action);
        $reflectionMethod->invokeArgs($this->controllerIntance , $parms);

        // Setando dados do post/put na controller
        if (in_array($router->getMethod() , ['PUT', 'POST'] ) )
        {
            $controllerIntance->setData($_POST);
        }


    }

}
