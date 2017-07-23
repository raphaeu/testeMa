<?php
namespace App\Model;

class Contato 
{

    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $usuarioId;
    

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
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;
    }
  
    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }




}
