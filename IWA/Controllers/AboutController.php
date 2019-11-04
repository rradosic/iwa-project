<?php
namespace IWA\Controllers;
use IWA\View;

class AboutController
{
    public function index()
    {
       View::render('about.iwa.php');
    }
}