<?php
const ROOT_DIR = __DIR__;
require_once ( ROOT_DIR . '/Core/autoload.php' );
require_once ( ROOT_DIR . '/Core/config.php' );

if (DEBUG == 1)
{
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
}

use Core\System;

$system = new System();
$system->run();
