<?php
namespace Core\Exception;

class EmptyAuthorizeException extends \Exception {
    
    public function __construct($message = '', $code = 0, Exception $previous = null)
    {
        parent::__construct('Autorização da rota deve ser um array com perfil preenchido.', $code, $previous);
    }
}
