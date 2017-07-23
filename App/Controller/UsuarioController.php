<?php
namespace App\Controller;

use Core\Controller;
use App\Model\Usuario;
use App\Model\UsuarioRepository;

class UsuarioController extends Controller
{
    public function registrar()
    {
        $dados = json_decode($this->getData());

        //validar campos
        empty($dados->nome)     ? $erros['nome']        = "Campo nome obrigatorio" : '';
        empty($dados->email)    ? $erros['email']       = "Campo email obrigatorio" : '';
        empty($dados->telefone) ? $erros['telefone']    = "Campo telefone obrigatorio" : '';

        if (!is_array($erros)){
            $usuario = new Usuario();

            $usuario->setNome($dados->nome);
            $usuario->setEmail($dados->email);
            $usuario->setTelefone($dados->telefone);
            $usuario->setSenha($dados->senha);

            UsuarioRepository::save($usuario);
        }



    }

    public function rrrr($a)
    {
        echo "<h1>$a</h1>";

    }
}
