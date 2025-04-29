<?php

use Slim\App;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Middlewares\AuthMiddleware;

return function (App $app) {
    
    $app->get('/', HomeController::class . ':index');

    $app->get('/dashboard', AuthController::class . ':dashboard')
        ->add(new AuthMiddleware());

    $app->get('/login', AuthController::class . ':login');
};
