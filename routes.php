<?php

use IWA\Controllers\IndexController;
use IWA\Controllers\AboutController;
use IWA\Controllers\LoginController;
use IWA\Route;

Route::get("/", function(){
    $controller = new IndexController();

    $controller->index();
});

Route::get("/about", function(){
    $controller = new AboutController();

    $controller->index();
});

Route::get("/login", function(){
    $controller = new LoginController();

    $controller->index();
});

Route::post("/authenticate", function(){
    $controller = new LoginController();

    $controller->authenticate();
});