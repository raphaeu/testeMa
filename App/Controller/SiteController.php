<?php
namespace App\Controller;

use Core\Controller;

class SiteController extends Controller
{
    public function index()
    {        
        return $this->view('/site/index', []);
    }
}
