<?php
namespace IWA;

use IWA\Models\User;

class Auth
{
    private static $userSessionKey = 'user_id';

    public static function attemptLogin($credentialsArray)
    {
        $user = User::where('korisnicko_ime', $credentialsArray['username']);
        $user = reset($user);

        if ($user && ($user->lozinka == $credentialsArray['password'])) {
            Session::write(self::$userSessionKey, $user->korisnik_id);
            return true;
        }
        
        return false;
    }

    public static function user()
    {
        if (Session::get(self::$userSessionKey)) {
            return User::find(Session::get(self::$userSessionKey));
        }
        
        return null;
    }

    public static function logout()
    {
        Session::write(self::$userSessionKey, null);
    }
}
