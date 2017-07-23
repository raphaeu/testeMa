<?php

return array(
    array(
        'method'     =>   'GET',
        'route'   =>   '/',
        'controller' =>   'SiteController',
        'action'     =>   'index',
    ),
    array(
        'method'     =>   'GET',
        'route'   =>   '/teste/:a/tttt/:b',
        'controller' =>   'SiteController',
        'action'     =>   'index',
    ),
    array(
        'method'     =>   'GET',
        'route'   =>   '/teste/:a',
        'controller' =>   'SiteController',
        'action'     =>   'index',
    ),
    array(
        'method'     =>   'POST',
        'route'   =>   '/registrar',
        'controller' =>   'UsuarioController',
        'action'     =>   'registrar',
    )

);
