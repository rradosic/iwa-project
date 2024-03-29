<?php
namespace IWA;

require_once "./routes.php";

use IWA\Session;
use IWA\Route;

class App
{
    protected $dbConnection;

    public static function boot()
    {
        Session::start();

        Route::dispatch($_SERVER['REQUEST_URI']);
    }
}
