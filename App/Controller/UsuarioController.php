<?php

namespace App\Controller;

use Core\Controller;
use App\Model\Usuario;
use App\Model\UsuarioRepository;

class UsuarioController extends Controller {

    public function registrar() {
        $dados = json_decode($this->getData());
        
        $erros = [];
        //validar campos
        empty($dados->nome) ? $erros['nome'] = "Campo nome obrigatorio" : '';
        empty($dados->email) ? $erros['email'] = "Campo email obrigatorio" : '';
        empty($dados->telefone) ? $erros['telefone'] = "Campo telefone obrigatorio" : '';

        if (!empty($dados->email) && UsuarioRepository::findUsuarioByEmail($dados->email) != null) {
            $erros['email'] = "Usuário com este e-mail já foi cadastrado"; 
        }        
        
        if (empty($erros)) {
            $usuario = new Usuario();

            $usuario->setNome($dados->nome);
            $usuario->setEmail($dados->email);
            $usuario->setTelefone($dados->telefone);
            $usuario->setSenha($dados->senha);
            
            UsuarioRepository::save($usuario);
            
            return $this->json(new Response('Usuário salvo com sucesso.'));
        }
        
        return $this->json(new Response('Ocorreu um erro', $erros, 400));
        
        
    }


}
