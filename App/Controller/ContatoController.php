<?php
namespace App\Controller;

use App\Model\Contato;
use App\Model\ContatoRepository;
use Core\Controller;

class ContatoController extends Controller
{
    public function index()
    {
        return $this->view('/site/contato/index', []);
    }

    public function salvar()
    {

        $dados = json_decode($this->getData());
        
        $erros = [];
        //validar campos
        empty($dados->nome) ? $erros['nome'] = "Campo nome obrigatorio" : '';
        empty($dados->email) ? $erros['email'] = "Campo email obrigatorio" : '';
        empty($dados->telefone) ? $erros['telefone'] = "Campo telefone obrigatorio" : '';

        if (empty($erros)) {
            $contato = new Contato();

            $contato->setNome($dados->nome);
            $contato->setEmail($dados->email);
            $contato->setTelefone($dados->telefone);
            //pegar da sessao
            $contato->setUsuarioId(1);
            
            ContatoRepository::save($contato);
            
            return $this->json(new Response('Contato salvo com sucesso.'));
        }
        
        return $this->json(new Response('Ocorreu um erro', $erros, 400));

    }

}
