<?php
namespace IWA;

class Session
{
    public static function start()
    {
        session_start();
    }

    public static function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function has($key)
    {
        return key_exists($key, $_SESSION);
    }

    public static function get($key)
    {
        if (self::has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    public static function pull($key)
    {
        $value = null;
        
        if (self::has($key)) {
            $value = $_SESSION[$key];
        }

        unset($_SESSION[$key]);

        return $value;
    }

    public static function invalidate()
    {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
        session_destroy();
    }
}
