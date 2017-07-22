<?php
namespace App\Model;

use Core\Model;

class Agenda extends Model
{

    private $id;
    private $nome;
    private $telefone;
    private $email;


    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setNome()
    {
        return $this->nome;
    }
    public function setTelefone()
    {
        return $this->telefone;
    }
    public function setEmail()
    {
        return $this->email;
    }




}
