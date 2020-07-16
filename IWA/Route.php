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
        $path = parse_url($uri)['path'];
        
        if (array_key_exists($path, $routes)) {
            if ($_SERVER['REQUEST_METHOD'] === $routes[$path]['type']) {
                $callback = $routes[$path]["callback"];
                print(call_user_func($callback));
            } else {
                print("Wrong request method!");
            }
        } else {
            http_response_code(404);
            return View::render('404.iwa.php');
        }
    }
}
