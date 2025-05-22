<?php

use Slim\App;
use App\Controller\ApiController;
use App\Middleware\ApiMiddleware;
use App\Controller\AuthController;
use App\Controller\UserController;
use App\Middleware\AuthMiddleware;
use App\Middleware\UserMiddleware;
use App\Controller\StorageController;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->get('/', [AuthController::class, 'landing'])->setName('landing')->add(AuthMiddleware::class);
    
    // Auth Routes
    $app->group('/auth', function (RouteCollectorProxy $group) {
        $group->any('/login', [AuthController::class, 'login'])->setName('auth.login')->add(AuthMiddleware::class);
        $group->any('/logout', [AuthController::class, 'logout'])->setName('auth.logout');
    });

    // User Routes
    $app->group('/user', function (RouteCollectorProxy $group) {
        $group->any('/dashboard', [UserController::class, 'dashboard'])->setName('user.dashboard')->add(UserMiddleware::class);
    })->add(UserMiddleware::class);
    
    // Storage Routes
    $app->any('/storage/user/{id}[/{params:.*}]', [StorageController::class, 'user'])->setName('storage.user')->add(UserMiddleware::class);

    // API Routes
    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->any('/{namespace}/{resource}[/{params:.*}]', [ApiController::class, 'process']);
    })->add(ApiMiddleware::class);
};
