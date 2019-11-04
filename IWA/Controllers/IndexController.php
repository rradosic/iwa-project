<?php
namespace IWA\Controllers;
use IWA\View;
class IndexController
{
    public function index(){
       View::render('index.iwa.php');
    }
}