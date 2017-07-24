<?php

namespace App\Model;

use Core\Db;
use PDO;
use App\Model\Contato;


class ContatoRepository {

    public static function save(Contato $contato)
    {
        if (!empty($contato->getId())){                    
            $stmt = Db::getInstance()->prepare('
                UPDATE contato SET
                    nome = :nome
                    ,email = :email
                    ,telefone = :telefone
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
                    ,email
                    ,telefone
                    ,usuario_id
                ) VALUES (
                    :nome
                    ,:email
                    ,:telefone
                    ,:usuario_id
                )
            ');
        }

        $nome = $contato->getNome();
        $email = $contato->getEmail();
        $telefone = $contato->getTelefone();
        $usuarioId = $contato->getUsuarioId();   
        
        $stmt->bindParam('nome', $nome , PDO::PARAM_STR);
        $stmt->bindParam('email', $email , PDO::PARAM_STR);
        $stmt->bindParam('telefone', $telefone , PDO::PARAM_STR);
        $stmt->bindParam('usuario_id', $usuarioId , PDO::PARAM_INT);
        
       return $stmt->execute();
    }
    
    public static function delete($id)
    {
        $sql = 'DELETE FROM contato WHERE id=:id';
        $stmt = Db::getInstance()->prepare($sql);        
        $stmt->bindParam('id', $id , PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public static function findContactsByUserId($userId)
    {
        $sql = '
            SELECT
                id
                ,nome
                ,email
                ,telefone
                ,usuario_id
            FROM
                contato
            WHERE
                usuario_id = :id

        ';
        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam('id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $contacts;
        
        
    }
    

    public static function findById($id)
    {
        $sql = '
            SELECT
                id
                ,nome
                ,email
                ,telefone
                ,usuario_id as usuarioId
            FROM
                contato
            WHERE
                id = :id

        ';
        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam('id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $contact = $stmt->fetch(PDO::FETCH_ASSOC);
        return $contact;
    }
    
    
}

 ?>
