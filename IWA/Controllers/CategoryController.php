<?php
namespace IWA\Controllers;

use IWA\Auth;
use IWA\Helpers;
use IWA\Models\Category;
use IWA\View;
use IWA\Models\User;
use IWA\Session;

class CategoryController
{
    private $title = "Kategorije";

    public function index()
    {
        $title = $this->title;
        $categories = Category::all();
        View::render('category/index.iwa.php', compact('title', 'categories'));
    }
}
