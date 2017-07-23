<?php

function __autoload($className) {
    $file =  str_replace('\\','/',$className);
      if (file_exists($file . '.php')) {
          require_once $file . '.php';
          return true;
      }
      return false;
}
function arrayCompAux($a,$b)
{

    if(strrpos($b, ':') === 0 || $b == $a)
        return false;
    else
        return true;

}
