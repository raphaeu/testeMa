<?php

namespace Core;

use Core\Exception\AuthenticationException;
use Core\Exception\EmptyAuthorizeException;

class Authorizer {

    private $authorizeds;

    public function __construct($authorized) {
        $this->authorizeds = $authorized;
    }

    public function isAuthorized() {  
        
        //Caso não esteja preenchido lança exceção
        if (!is_array($this->authorizeds) || empty($this->authorizeds)) {
            throw new EmptyAuthorizeException;
        }
        //Caso seja liberado para o perfil GUEST retorna autorizadio
        if (in_array(Profile::GUEST, $this->authorizeds)) {            
            return true;
        }
        $usuario = Session::getUserSession();
        //Verifia se o usuário esta logado
        if ($usuario == null) {
            throw new AuthenticationException('Usuário não logado');
        }
        
        foreach ($this->authorizeds as $authorized) {
            if($usuario->getPerfil() == $authorized) {
                return true;
            }
        }
        
        throw new Exception\AuthorizationException('Usuário não autorizado');
    }

}
