<?php
namespace Core;

class Router {


    private $routes=[];
    private $url;
    private $default = '/index';
    private $method;
    private $routeIndex;
    private $routeId;
    private $parms = [];

    public function __construct() {
        $this->setRoutes();
        $this->setUrl();
        $this->setMethod();
        $this->setRouteId();
        $this->setController();
        $this->setAction();
        $this->setParms();
    }


    private function setMethod()
    {
        $this->method = isset($_REQUEST['_method'])?$_REQUEST['_method']:$_SERVER['REQUEST_METHOD'];
    }



    private function setRouteId()
    {
        $aUrl = $this->explodeUrl($this->url);
        foreach($this->routes as $index => $route){
            if ($this->method == $route['method'])
            {
                $aRoute = $this->explodeUrl($route['resource']);
                if (count(array_udiff_assoc($aUrl, $aRoute,'arrayCompAux')) == 0 && count($aRoute) == count($aUrl))
                {
                    $this->routeId = $index;
                    return;
                }
            }
        }
        die('nenhuma rota encontrada para '. $this->url);
    }


    private function setUrl(){
        $this->url =$_SERVER['PATH_INFO'];
    }

    private function explodeUrl($str)
    {
        if(isset($str)){
            $aStr = explode('/',$str);
            foreach($aStr as $val){
                if (!empty($val)){
                    $return[] =  $val;
                }
            }
            return $return;
        }
    }

    private function setRoutes()
    {
        $this->routes = require( ROOT_DIR . '/App/routes.php');
    }


    private function setAction(){
        //verifica se exsite
        $this->action = $this->routes[$this->routeId]['action'];
    }
    private function setController($controller){
        //verifica se existe
        $this->controller = $this->routes[$this->routeId]['controller'];
    }

    private function setParms()
    {
        if (strrpos($this->routes[$this->routeId]['resource'], ':'))
        {
            $aUrl = $this->explodeUrl($this->url);
            $aRoute = $this->explodeUrl($this->routes[$this->routeId]['resource']);
            foreach($aRoute as $index => $val)
            {
                if (strrpos($val, ':') === 0)
                {
                    $this->parms[str_replace(':','',$val) ] =  $aUrl[$index] ;
                }

            }
        }
    }

    public function getParms()
    {
        return $this->parms;
    }

    public function getController()
    {
        return ROOT_CONTROLLER.$this->controller;
    }
    public function getAction()
    {
        return $this->action;
    }
    public function getMethod()
    {
        return $this->method;
    }


}


 ?>
