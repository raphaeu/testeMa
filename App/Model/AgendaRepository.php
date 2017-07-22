<?php

namespace App\Model;

use Core\Model;
use Core\Db;

class AgendaRepository {

    public static function save(Agenda $agenda){

        if (isset($agenda->id)){
            $sql = '
                UPDATE FROM agenda SET
                    nome = :nome
                    ,telefone = :telefone
                    ,email = :email
                    ,usuario_id = :usuario_id
                WHERE
                    id = :id
            ';
        }else{
            $sql = '
                INSERT INTO agenda
                (
                    nome
                    ,telefone
                    ,email
                    ,usuario_id
                ) VALUES (
                    :nome
                    ,:telefone
                    ,:email
                    ,:usuario_id
                )
            ';
        }
        $stmt = Db::getInstance()->prepare($sql);

        $stmt->bindParam('id', $agenda->getId(), \PDO::PARAM_INT);
        $stmt->bindParam('usuario_id', $agenda->getUsuarioId(), \PDO::PARAM_INT);
        $stmt->bindParam('nome', $agenda->getNome(), \PDO::PARAM_STR);
        $stmt->bindParam('telefone', $agenda->getTelefone(), \PDO::PARAM_STR);
        $stmt->bindParam('email', $agenda->getEmail(), \PDO::PARAM_STR);

       return $stmt->execute();
    }

    public static function destroy($id){
        $sql = 'DELETE FROM agenda WHERE id=:id';
        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam('id', $agenda->getId(), \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function find($id){
        $sql = '
            SELECT
                id
                ,nome
                ,telefone
                ,email
                ,usuario_id
            FROM
                agenda
            WHERE
                id = :id
            )
        ';
        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam('id', $agenda->getId(), \PDO::PARAM_INT);
        return $stmt->execute();
    }

}

 ?>
