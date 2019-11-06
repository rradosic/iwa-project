<?php
namespace IWA;

class View
{
    private static $baseDir = './views/';

    public static function render($templatePath, $data = null)
    {
        if($data) extract($data);
        
        require(View::$baseDir.$templatePath);
    }
}