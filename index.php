<?php

/**const ROOT_DIR = __DIR__;

require ROOT_DIR . 'core/autoload.php';
const ROUTES = ROOT_DIR . 'app/routes.php';

use Core/System;

$system = new System();
$system->run();
**/
$teste = new Teste();
$teste->testar();

class Controller {

    public function deletar($id, $nome, $lalala, $bababa) {
        var_dump($id, $nome, $lalala, $baba);
    }

    public function listar() {
        echo "Listando..";
    }

}
class Teste{

    public function testar(){
        $controllerName = 'Controller';
        $controllerIntance = new $controllerName;
        $reflectionMethod = new ReflectionMethod($controllerName, 'listar');
        $reflectionMethod->invokeArgs($controllerIntance, array());

    }



}
