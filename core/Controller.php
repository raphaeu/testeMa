<?php
namespace Core;


class Controller{
    protected $data;
    public function setData();
    public function getData();

    public function view($file, $data){
        //retorna view
    }
    public function response($file, $data){
        if($header == 'json') {
            $this->json($data);
        } else {
            $this->view($file, $data);
        }
    }
    public function redirect($url){}
    public function json($data){
        //retorna json encode


    }
}
