<?php

namespace Core;

use Core\Exception\AuthenticationException;
use Core\Exception\AuthorizationException;
use Core\Exception\RouteNotFoundException;
use Exception;
use ReflectionMethod;

class System {

    private $controllerIntance;

    public function run() {

        try {
            $router = new Router();
            //Cria a instancia conexão com banco
            Db::getInstance();

            // Carregando informacoes da classe para instanciar
            $controller = $router->getController();
            $action = $router->getAction();
            $parms = $router->getParms();
            $method = $router->getMethod();
            $authorized = $router->getAuthorization();


            $auth = Authorizer::isAuthorized($authorized);

            

            // Instanciando classe e setando parametros por reflection
            $this->controllerIntance = new $controller;
            // Setando dados do post/put na controller
            if (in_array($method, ['PUT', 'POST'])) {
                $this->controllerIntance->setData(file_get_contents('php://input'));
            }

            $reflectionMethod = new ReflectionMethod($controller, $action);
            $reflectionMethod->invokeArgs($this->controllerIntance, $parms);
        } catch (AuthorizationException $e) {
            http_response_code(403);
            include(ROOT_VIEW . '/erros/403.php');
        } catch (AuthenticationException $e) {
            http_response_code(401);
            include(ROOT_VIEW . '/erros/404.php');
        } catch (RouteNotFoundException $e) {
            http_response_code(404);
            include(ROOT_VIEW . '/erros/404.php');
        } catch (Exception $e) {
            http_response_code(500);
            include(ROOT_VIEW . '/erros/500.php');
        }
    }

}
