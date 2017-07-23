<?php

namespace Core;

use App\Controller\Response;

class Controller {

    protected $data;

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function view($file, $data) {
        $filename = ROOT_VIEW . str_replace('\\', '/', $file) . '.php';
        if (file_exists($filename))
            include($filename);
        else
            die('View informada nao exite: ' . $filename);
    }

    public function response($file, $data) {
        if ($header == 'json') {
            $this->json($data);
        } else {
            $this->view($file, $data);
        }
    }

    public function redirect($url) {
        
    }

    public function json(Response $response) {
        http_response_code($response->getCode());
        echo json_encode([
            'message' => $response->getMessage(),
            'body' => $response->getData()]
        );
    }

}
