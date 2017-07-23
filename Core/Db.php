<?php

namespace Core;


class Db {
   private static $instance = null;
   private function __construct()
   {
   }
   /**
    * @return \PDO
    */
   public static function getInstance()
   {
       if (self::$instance === null) {
           self::$instance = new \PDO('mysql:host=localhost;dbname=madero', 'root', 'root');;
       }
       return self::$instance;
   }
}
