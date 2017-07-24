<?php

namespace App\Controller;

use App\Model\UsuarioRepository;
use Core\Controller;
use Core\Response;
use Core\Auth;

class AuthController extends Controller {

    public function login() {
        $dados = json_decode($this->getData());

        $erros = [];
        //validar campos
        empty($dados->email) ? $erros['email'] = "Campo email obrigatorio" : '';
        empty($dados->senha) ? $erros['senha'] = "Campo senha obrigatorio" : '';
        
        $usuario = UsuarioRepository::findUsuarioByEmailSenha($dados->email, md5($dados->senha));
        !$usuario ? $erros['usuario'] = "Usuário ou senha inválidos" : '';
        
        if (empty($erros)) {
            Auth::authenticate($usuario);
            return $this->json(new Response('Logado com sucesso'));
        }
        return $this->json(new Response('Erro ao autenticar usuário', $erros, 400));
    }

    public function logout() {
        Auth::destroy();
        $this->redirect("/");
    }

}
