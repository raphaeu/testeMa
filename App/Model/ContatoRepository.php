<?php

namespace App\Model;

use Core\Db;
use PDO;

class ContatoRepository {

    public static function save(Contato $contato){

        if (isset($contato->id)){
            $stmt = Db::getInstance()->prepare('
                UPDATE FROM contato SET
                    nome = :nome
                    ,telefone = :telefone
                    ,email = :email
                    ,usuario_id = :usuario_id
                WHERE
                    id = :id
            ');
            $id = $contato->getId();
            $stmt->bindParam('id',$id , PDO::PARAM_INT);
        }else{
            $stmt = Db::getInstance()->prepare('
                INSERT INTO contato
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
            ');
        }

        $usuarioId = $contato->getUsuarioId();   
        $nome = $contato->getNome();
        $telefone = $contato->getTelefone();
        $email = $contato->getEmail();
        
        $stmt->bindParam('usuario_id', $usuarioId , PDO::PARAM_INT);
        $stmt->bindParam('nome', $nome , PDO::PARAM_STR);
        $stmt->bindParam('telefone', $telefone , PDO::PARAM_STR);
        $stmt->bindParam('email', $email , PDO::PARAM_STR);

       return $stmt->execute();
    }

    public static function destroy($id){
        $sql = 'DELETE FROM contato WHERE id=:id';
        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam('id', $contato->getId(), PDO::PARAM_INT);
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
                contato
            WHERE
                id = :id
            )
        ';
        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam('id', $contato->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

}

 ?>
