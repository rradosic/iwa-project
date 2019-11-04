<?php
namespace IWA;

$routes = [];

class Route
{
    public static function get($uri, \Closure $callback)
    {
        global $routes;
        $action = trim($uri);
        $routes[$action] = [
            "type" => "GET",
            "callback" => $callback
        ];
    }

    public static function post($uri, \Closure $callback)
    {
        global $routes;
        $action = trim($uri);
        $routes[$action] = [
            "type" => "POST",
            "callback" => $callback
        ];
    }

    public static function dispatch($uri)
    {
        global $routes;
        $action = trim($uri);
        if(array_key_exists($action, $routes)){
            if ($_SERVER['REQUEST_METHOD'] === $routes[$action]['type']) {
                $callback = $routes[$action]["callback"];
                print (call_user_func($callback));
            }
            else print("Wrong request method!");
        }
        else{
            http_response_code(404);
            return View::render('404.iwa.php');
        }
        
    }
}