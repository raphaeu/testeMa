<?php

namespace App\Model;

use Core\Model;
use Core\Db;

class AgendaRepository {

    public static function save(Agenda $agenda){
       $stmt = Db::getInstance()->prepare('INSERT INTO agenda(name, email, password, plan_id) VALUES (:name, :email,
                                   :password, :plan)');
       $name = $user->getName();
       $email = $user->getEmail();
       $password = $user->getPassword();
       $planID = $user->getPlan()->getId();
       $stmt->bindParam('name', $name, \PDO::PARAM_STR);
       $stmt->bindParam('email', $email, \PDO::PARAM_STR);
       $stmt->bindParam('password', $password, \PDO::PARAM_STR);
       $stmt->bindParam('plan', $planID, \PDO::PARAM_INT);
       return $stmt->execute();
    }
    public function destroy(){

    }
    public function find($id){

    }
    public function findAll(){

    }


}

 ?>
