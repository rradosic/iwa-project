<?php
namespace IWA\Controllers;
use IWA\View;

class LoginController
{
    private $title = "Prijava";

    public function index(){
        $title = $this->title;

        View::render('login.iwa.php', compact('title'));
    }

    public function authenticate(){
        var_dump($_REQUEST);
    }
}