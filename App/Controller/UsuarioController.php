<?php

namespace App\Controller;

use Core\Controller;
use App\Model\Usuario;
use App\Model\UsuarioRepository;
use Core\Response;

class UsuarioController extends Controller {

    public function registrar() {
        $dados = json_decode($this->getData());
        
        //validar campos
        $erros = [];
        empty($dados->nome) ? $erros['nome'] = "Campo nome obrigatorio" : '';
        empty($dados->email) ? $erros['email'] = "Campo email obrigatorio" : '';

        if (!empty($dados->email) && UsuarioRepository::findUsuarioByEmail($dados->email) != null) {
            $erros['email'] = "Usuário com este e-mail já foi cadastrado"; 
        }        
        empty($dados->senha) ? $erros['senha'] = "Campo senha obrigatorio" : '';
        $dados->senha != $dados->senhaConfirma && empty($erros['email'])? $erros['senha'] = "Senhas informada não correspondem." : '';
        
        if (empty($erros)) {
            $usuario = new Usuario();

            $usuario->setNome($dados->nome);
            $usuario->setEmail($dados->email);
            $usuario->setSenha(md5($dados->senha));
            $usuario->setPerfil(\Core\Profile::USER);
            
            UsuarioRepository::save($usuario);
            
            return $this->json(new Response('Usuário salvo com sucesso.'));
        }
        
        return $this->json(new Response('Ocorreu um erro', $erros, 400));
    }
}
