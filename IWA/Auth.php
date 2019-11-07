<?php
namespace IWA;

use IWA\Models\User;

class Auth 
{

    public static function attempt($credentialsArray){
        $user = User::where('korisnicko_ime', $credentialsArray['username']);
        var_dump($user);
        die();
    }

}