<?php

use IWA\Controllers\IndexController;
use IWA\Controllers\AboutController;
use IWA\Controllers\LoginController;
use IWA\Controllers\CategoryController;
use IWA\Controllers\ProjectController;
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

Route::get("/logout", function(){
    $controller = new LoginController();

    $controller->logout();
});

Route::post("/authenticate", function(){
    $controller = new LoginController();

    $controller->authenticate();
});

Route::get("/categories", function(){
    $controller = new CategoryController();

    $controller->index();
});

Route::get("/projects", function(){
    $controller = new ProjectController();

    $controller->index();
});

Route::get("/projects/create", function(){
    $controller = new ProjectController();

    $controller->create();
});

Route::post("/projects/store", function(){
    $controller = new ProjectController();

    $controller->store();
});

Route::get("/projects/edit", function(){
    $controller = new ProjectController();

    $controller->edit();
});

Route::post("/projects/update", function(){
    $controller = new ProjectController();

    $controller->update();
});