<?php
namespace IWA\Controllers;

use IWA\Auth;
use IWA\Helpers;
use IWA\View;
use IWA\Models\User;
use IWA\Session;

class LoginController
{
    private $title = "Prijava";

    public function index()
    {
        $title = $this->title;
        View::render('login.iwa.php', compact('title'));
    }

    public function authenticate()
    {
        $request = $_REQUEST;
        if (key_exists('username', $request) && key_exists('password', $request)) {
            Auth::attemptLogin($request);
        }

        Helpers::redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        Session::invalidate();

        Helpers::redirect('/');
    }
}
