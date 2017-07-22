<?php

const ROOT_DIR = __DIR__;
const ROOT_VIEW  = '/App/View';
const ROOT_CONTROLLER = '\App\Controller\\';
require_once ( ROOT_DIR . '/Core/autoload.php' );

use Core\System;

$system = new System();
$system->run();
