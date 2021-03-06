<?php

namespace Core;


class Controller {

    protected $data;

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function view($file, $data) {
        extract($data);
        $filename = ROOT_VIEW . str_replace('\\', '/', $file) . '.php';
        if (file_exists($filename))
            include($filename);
        else            
            throw new \Exception('View informada nao exite: ' . $filename);
    }



    public function redirect($url) {
        header('Location: '.$url);
    }

    public function json(Response $response) {
        http_response_code($response->getCode());
        echo json_encode([
            'message' => $response->getMessage(),
            'body' => $response->getData()]
        );
    }

}
