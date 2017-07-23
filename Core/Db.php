<?php

namespace Core;

class Db {

    private static $instance = null;

    private function __construct() {
        
    }

    /**
     * @return \PDO
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new \PDO('mysql:host=localhost;dbname=madero', 'root', '3px_px3ext4');
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        }
        return self::$instance;
    }

}
