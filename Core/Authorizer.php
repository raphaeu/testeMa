<?php

namespace Core;

use Core\Exception\AuthenticationException;
use Core\Exception\EmptyAuthorizeException;

class Authorizer {

     public static function isAuthorized($authorizeds) {  
        
        //Caso não esteja preenchido lança exceção
        if (!is_array($authorizeds) || empty($authorizeds)) {
            throw new EmptyAuthorizeException;
        }
        //Caso seja liberado para o perfil GUEST retorna autorizadio
        if (in_array(Profile::GUEST, $authorizeds)) {            
            return true;
        }
        $usuario = Auth::getUserSession();
        //Verifia se o usuário esta logado
        if ($usuario == null) {
            throw new AuthenticationException('Usuário não logado');
        }
        
        foreach ($authorizeds as $authorized) {
            if($usuario->getPerfil() == $authorized) {
                return true;
            }
        }
        
        throw new Exception\AuthorizationException('Usuário não autorizado');
    }
    

    
}
