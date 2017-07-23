<?php

return array(
    array(
        'method'     =>   'GET',
        'route'   =>   '/',
        'controller' =>   'SiteController',
        'action'     =>   'index',
        'authorize' => \Core\Profile::all()
    ),
    array(
        'method'     =>   'POST',
        'route'   =>   '/registrar',
        'controller' =>   'UsuarioController',
        'action'     =>   'registrar',
        'authorize' => \Core\Profile::all()
    ),
    array(
        'method'     =>   'POST',
        'route'   =>   '/login',
        'controller' =>   'AuthController',
        'action'     =>   'login',
        'authorize' => \Core\Profile::all()
    ),
    array(
        'method'     =>   'GET',
        'route'   =>   '/logout',
        'controller' =>   'AuthController',
        'action'     =>   'logout',
        'authorize' => \Core\Profile::all()
    ),
    array(
        'method'     =>   'GET',
        'route'   =>   '/teste',
        'controller' =>   'SiteController',
        'action'     =>   'teste',
        'authorize' => [\Core\Profile::GUEST]
    ),

);
