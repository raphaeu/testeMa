<?php
namespace App\Controller;

use App\Model\Contato;
use App\Model\ContatoRepository;
use Core\Controller;
use Core\Response;
use Core\Auth;

class ContatoController extends Controller
{
    public function index()
    {
        return $this->view('/site/contato/index', ['userId' => Auth::getUserSession()->getId()]);
    }
    

    public function save($id=null)
    {

        $dados = json_decode($this->getData());
        
        $erros = [];
        //validar campos
        empty($dados->nome) ? $erros['nome'] = "Campo nome obrigatorio" : '';
        empty($dados->email) ? $erros['email'] = "Campo email obrigatorio" : '';
        empty($dados->telefone) ? $erros['telefone'] = "Campo telefone obrigatorio" : '';

        if (empty($erros)) {
            $contato = new Contato();
            
            !empty($id) ? $contato->setId($dados->id) : '';
            $contato->setNome($dados->nome);
            $contato->setEmail($dados->email);
            $contato->setTelefone($dados->telefone);    
            $contato->setUsuarioId(Auth::getUserSession()->getId());

            ContatoRepository::save($contato);
            
            return $this->json(new Response('Contato salvo com sucesso.'));
        }
        
        return $this->json(new Response('Ocorreu um erro', $erros, 400));

    }
    
    public function listContacts($userId)
    {
        //verificar se os contatos pertence 
        
        if ($userId == Auth::getUserSession()->getId())
        {
            $contacts = ContatoRepository::findContactsByUserId($userId);
            return $this->json(new Response('Lista de contato existente.', $contacts));
        } else{
           //lancar erro de aceso negado
        }   
    }
    
    
    public function delete($id)
    {
        ContatoRepository::delete($id);
        return $this->json(new Response('Contato excluido com sucesso.'));

    }
    
    public function edit($id)
    {
        $contact = ContatoRepository::findById($id);
        
        return $this->json(new Response('', $contact));
        
    }
   
    
}
