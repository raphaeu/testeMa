<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


const ROOT_DIR = __DIR__;
const ROOT_VIEW  = 'App/View';
const ROOT_CONTROLLER = '\App\Controller\\';
require_once ( ROOT_DIR . '/Core/autoload.php' );



use Core\System;

$system = new System();
$system->run();
