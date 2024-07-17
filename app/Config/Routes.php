<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('logout', 'AuthController::logout');

$routes->group('', ['filter' => 'guest'], function ($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::doLogin');
    
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::doRegister');
});


$routes->group('', ['filter' => 'auth'], function ($routes) {
    // Define routes that require authentication within this group
    $routes->get('dashboard', 'DashboardController::index');

    
    $routes->get('profile', 'ProfileController::index');
    $routes->post('profile', 'ProfileController::doUpdateProfile');
    $routes->post('update-password', 'ProfileController::doUpdatePassword');
    $routes->post('update-picture', 'ProfileController::doUpdatePicture');

    $routes->get('search', 'SearchController::index');
    $routes->post('search', 'SearchController::search');

});