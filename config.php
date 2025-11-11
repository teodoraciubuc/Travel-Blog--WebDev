<?php

// constantele globale ale proiectului
define('APP_PATH', 'myApp/');
define('MODELS', 'models/');
define('VIEWS', 'views/');
define('CONTROLLERS', 'controllers/');

spl_autoload_register(function($className){
    $relPath = '';
    $class = strtolower($className);
    
    if(str_contains($class, 'model')) $relPath = MODELS;
    elseif(str_contains($class, 'view')) $relPath = VIEWS;
    elseif(str_contains($class, 'controller')) $relPath = CONTROLLERS;

    $filePath = APP_PATH . $relPath . $className . '.php';
    
    $filePath = APP_PATH . $relPath . $className . '.php';
    if($filePath == '') die('invalid PATH!');

    if(file_exists($filePath)) require_once $filePath;
    else die("File $filePath NOT found");
    $filePath = APP_PATH . $relPath . $className . '.php';
    if($filePath == '') die('invalid PATH!');

    if(file_exists($filePath)) require_once $filePath;
    else die("File $filePath NOT found");
});
