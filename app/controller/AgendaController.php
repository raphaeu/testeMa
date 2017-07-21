<?php
namespace App\Controller;

use Core\Controller;
use Model\AgendaRepository;

class AgendaController extends Controller
{
    public function index()
    {
        return view('view/agenda/index', []);

    }

    public function list() {
        return json();
    }

    public function create(){}
    public function store(){
        //valida

        //redirect


        $agenda = new Agenda();
        $agenda->setNome($this->data->nome);
        $agenda->setEmail($this->data->email);
        $agenda->setTelefone($this->data->telefone);

        AgendaRepository::save($agenda);

    }

    public function edit($id){}
    public function update(){}

    public function destroy($id){}
}
