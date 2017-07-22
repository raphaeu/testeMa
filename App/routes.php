<?php

return array(
    array(
        'method'     =>   'GET',
        'resource'   =>   '/:a/:b',
        'controller' =>   'Site',
        'action'     =>   'index',
    ),
    array(
        'method'     =>   'GET',
        'resource'   =>   '/registrar',
        'controller' =>   'Site',
        'action'     =>   'registrar',
    ),
    array(
        'method'     =>   'GET',
        'resource'   =>   '/usuario/:id',
        'controller' =>   'Usuario',
        'action'     =>   'show',
    )

);
