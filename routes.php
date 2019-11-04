<?php

use IWA\Controllers\IndexController;
use IWA\Controllers\AboutController;
use IWA\Route;

Route::get("/", function(){
    $controller = new IndexController();

    $controller->index();
});

Route::get("/about", function(){
    $controller = new AboutController();

    $controller->index();
});