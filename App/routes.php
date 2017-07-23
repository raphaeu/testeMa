<?php

return array(
    array(
        'method'     =>   'GET',
        'route'      =>   '/',
        'controller' =>   'SiteController',
        'action'     =>   'index',
    ),
    array(
        'method'     =>     'POST',
        'route'      =>     '/registrar',
        'controller' =>     'UsuarioController',
        'action'     =>     'registrar',
    ),
    array(
        'method'    =>   'GET',
        'route'     =>   '/contato',
        'controller'=>   'ContatoController',
        'action'    =>   'index',
    ),
    array(
        'method'    =>   'POST',
        'route'     =>   '/contato',
        'controller'=>   'ContatoController',
        'action'    =>   'salvar',
    )

);
