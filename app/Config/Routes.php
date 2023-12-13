<?php

use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\LibroController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['namespace' => '\App\Controllers\Auth'], static function ($routes) {
    $routes->get('signup',  [RegisterController::class, 'index']);
    $routes->post( 'signup/store', [RegisterController::class, 'store']);
    $routes->post( 'login', [LoginController::class, 'login']);
    $routes->get('logout', [LoginController::class, 'logout']);
});

$routes->group('', ['namespace' => '\App\Controllers\Admin', 'filter' => 'auth'], static function ($routes) {
    $routes->get('inicio', [DashboardController::class, 'index']);

    $routes->get('libro', [LibroController::class, 'listByTemas']);
    $routes->get('libro/show/(:num)', [LibroController::class, 'findByTemas/$1']);
    $routes->post('libro/update/(:num)', [LibroController::class, 'update/$1']);

    $routes->get('libroT', [LibroController::class, 'index']);
    $routes->post('libro', [LibroController::class, 'show']);

});

$routes->add('(:any)', [LoginController::class, 'index']);
