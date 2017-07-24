<?php

use Core\Profile;

return array(
    array(
        'method'     =>   'GET',
        'route'      =>   '/',
        'controller' =>   'SiteController',
        'action'     =>   'index',
        'authorize' => Profile::all()
    ),
   
    array(
        'method'     =>   'POST',
        'route'   =>   '/login',
        'controller' =>   'AuthController',
        'action'     =>   'login',
        'authorize' => Profile::all()
    ),
    array(
        'method'     =>     'POST',
        'route'      =>     '/registrar',
        'controller' =>     'UsuarioController',
        'action'     =>     'registrar',
        'authorize' => Profile::all()
    ),
    array(
        'method'    =>   'GET',
        'route'     =>   '/contato',
        'controller'=>   'ContatoController',
        'action'    =>   'index',
        'authorize' =>  [Profile::USER, Profile::MASTER]
    ),
    array(
        'method'    =>   'GET',
        'route'     =>   '/contato/listar/:user_id',
        'controller'=>   'ContatoController',
        'action'    =>   'listContacts',
        'authorize' =>  [Profile::USER, Profile::MASTER]
    ),
    array(
        'method'    =>   'GET',
        'route'     =>   '/contato/:id',
        'controller'=>   'ContatoController',
        'action'    =>   'edit',
        'authorize' =>  [Profile::USER, Profile::MASTER]
    ),

    array(
        'method'    =>   'POST',
        'route'     =>   '/contato',
        'controller'=>   'ContatoController',
        'action'    =>   'save',
        'authorize' =>  [Profile::USER, Profile::MASTER]
    ),
    array(
        'method'    =>   'DELETE',
        'route'     =>   '/contato/:id',
        'controller'=>   'ContatoController',
        'action'    =>   'delete',
        'authorize' =>  [Profile::USER, Profile::MASTER]
    ),

    array(
        'method'    =>   'PUT',
        'route'     =>   '/contato/:id',
        'controller'=>   'ContatoController',
        'action'    =>   'save',
        'authorize' =>  [Profile::USER, Profile::MASTER]
    ),

    array(
        'method'     =>   'GET',
        'route'   =>   '/logout',
        'controller' =>   'AuthController',
        'action'     =>   'logout',
        'authorize' => Profile::all()
    ),
    array(
        'method'     =>   'GET',
        'route'   =>   '/teste',
        'controller' =>   'SiteController',
        'action'     =>   'teste',
        'authorize' => [Profile::GUEST]
    ),

);
