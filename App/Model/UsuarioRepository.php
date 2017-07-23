<?php

namespace App\Model;

use App\Model\Usuario;
use Core\Db as Db;
use PDO;

class UsuarioRepository {
    
    public static function findUsuarioByEmail($email)
    {
        $stmt = Db::getInstance()->prepare('SELECT *                                    
                                    FROM usuario WHERE email = :email');
        $stmt->execute([
            'email' => $email
        ]);
        $user = $stmt->fetchObject(Usuario::class);        
        return $user;
    }

    public static function save(Usuario $usuario){


        if ( !empty($usuario->getId())  ){
            $stmt = Db::getInstance()->prepare('
                UPDATE FROM usuario SET
                    nome = :nome
                    ,telefone = :telefone
                    ,email = :email
                    ,senha = :senha
                WHERE
                    id = :id
            ');

            $stmt->bindParam('id', $id , PDO::PARAM_INT);

        }else{
            $stmt = Db::getInstance()->prepare('
                INSERT INTO usuario
                (
                    nome
                    ,telefone
                    ,email
                    ,senha
                ) VALUES (
                    :nome
                    ,:telefone
                    ,:email
                    ,:senha
                )
            ');
        }

        $id         =   $usuario->getId();
        $nome       =   $usuario->getNome();
        $telefone   =   $usuario->getTelefone();
        $email      =   $usuario->getEmail();
        $senha      =   $usuario->getSenha();


        $stmt->bindParam('nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam('telefone', $telefone, PDO::PARAM_STR);
        $stmt->bindParam('email', $email, PDO::PARAM_STR);
        $stmt->bindParam('senha', $senha, PDO::PARAM_STR);

        return $stmt->execute();
        //echo $stmt->errorCode();exit;
    }

    public static function destroy($id){
        $sql = 'DELETE FROM usuario WHERE id=:id';
        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam('id', $usuario->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function find($id){
        $sql = '
            SELECT
                id
                ,nome
                ,telefone
                ,email
                ,senha
            FROM
                usuario
            WHERE
                id = :id
            )
        ';
        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam('id', $usuario->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

}

 ?>
