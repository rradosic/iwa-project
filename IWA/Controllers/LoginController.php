<?php
namespace IWA\Controllers;

use IWA\Auth;
use IWA\Models\User;
use IWA\View;

class LoginController
{
    private $title = "Prijava";

    public function index(){
        $title = $this->title;
        $user = User::find(53);
        View::render('login.iwa.php', compact('title'));
    }

    public function authenticate(){
        $request = $_REQUEST;
        if(key_exists('username', $request) && key_exists('password', $request)){
            Auth::attempt($request);
        }
    }
}