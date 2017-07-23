<?php
namespace Core;

class Response {
    
    function __construct($message, $data = [], $code = 200) {
        $this->message = $message;
        $this->code = $code;
        $this->data = $data;
    }

    
    function getMessage() {
        return $this->message;
    }

    function getCode() {
        return $this->code;
    }

    function getData() {
        return $this->data;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setData($data) {
        $this->data = $data;
    }

        
    private $message;
    
    private $code;
    
    private $data;
    
    
    
}
