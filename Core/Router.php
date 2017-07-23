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
    private $authorization;

    public function __construct() {
        $this->setRoutes();
        $this->setUrl();
        $this->setMethod();
        $this->setRouteId();
        $this->setController();
        $this->setAction();
        $this->setParms();
        $this->setAuthorization();
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
                $aRoute = $this->explodeUrl($route['route']);
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
        $this->url =isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'';
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
            return isset($return)?$return:[];
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
    private function setController(){
        //verifica se existe
        $this->controller = $this->routes[$this->routeId]['controller'];
    }
    
    private function setAuthorization() {
        $this->authorization = $this->routes[$this->routeId]['authorize'];
    }
    
    

    private function setParms()
    {
        if (strrpos($this->routes[$this->routeId]['route'], ':'))
        {
            $aUrl = $this->explodeUrl($this->url);
            $aRoute = $this->explodeUrl($this->routes[$this->routeId]['route']);
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
    
    function getAuthorization() 
    {
        return $this->authorization;
    }




}


 ?>
