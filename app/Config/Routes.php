<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

service('auth')->routes($routes);

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('manageUsers', 'Admin\Dashboard::manageUsers');
    $routes->match(['get', 'post'], 'createUser', 'Admin\Dashboard::createUser');
    $routes->match(['get', 'post'], 'editUser/(:num)', 'Admin\Dashboard::editUser/$1');
    $routes->get('deleteUser/(:num)', 'Admin\Dashboard::deleteUser/$1');
});

$routes->group('admin', function($routes) {
    $routes->get('login', 'Admin\Auth::index');
    $routes->post('login', 'Admin\Auth::login');
    $routes->get('logout', 'Admin\Auth::logout');
});
