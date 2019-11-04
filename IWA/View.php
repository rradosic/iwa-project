<?php
namespace IWA;

class View
{
    private static $baseDir = './views/';

    public static function render($templatePath)
    {
        require(View::$baseDir.$templatePath);
    }
}