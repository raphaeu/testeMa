<?php

namespace Core;

use ReflectionMethod;

class System{

    private $controllerIntance;

    public function run(){

        $router = new Router();


        // Carregando informacoes da classe para instanciar
        $controller     =   $router->getController();
        $action         =   $router->getAction();
        $parms          =   $router->getParms();
        $method         =   $router->getMethod();

        // Instanciando classe e setando parametros por reflection
        $this->controllerIntance = new $controller;
        // Setando dados do post/put na controller
        if (in_array($method , ['PUT', 'POST'] ) )
        {
            $this->controllerIntance->setData(file_get_contents('php://input'));
        }

        $reflectionMethod = new ReflectionMethod($controller, $action);
        $reflectionMethod->invokeArgs($this->controllerIntance , $parms);

        /*
        echo "Method: ".$router->getMethod();
        echo "<br>";
        echo "Controller: ".$router->getController();
        echo "<br>";
        echo "Action: ".$router->getAction();
        echo "<br>";
        echo "Parms: ".print_r($router->getParms(),1);
        echo "<br>";
        echo "Data: ".print_r($this->controllerIntance->getData(),1);
*/

    }

}
