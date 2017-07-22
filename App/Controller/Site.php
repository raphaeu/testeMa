<?php
namespace App\Controller;

use Core\Controller;

class Site extends Controller
{
    public function index()
    {
        return $this->view('/site/index', []);
    }
}
