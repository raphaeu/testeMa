<?php
namespace Core;

class Url{

    private $url;
    private $method;
    private $controller;
    private $action;
    private $params = [];


    public function __contruct(){
        $this->setUrl();
        $this->setMethod();
        $this->setController();
        $this->setAction();
        $this->setParams();

    }

    private function setUrl(){}
    private function setMethod(){}
    private function setController(){}
    private function setAction(){}
    private function setParams(){}

    public function getMethod(){}
    public function getController(){}
    public function getAction(){}
    public function getParams(){}



}
