<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::attemptRegister');
$routes->get('/logout', 'Auth::logout');

$routes->group('books', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Books::index');
    $routes->get('create', 'Books::create');
    $routes->post('store', 'Books::store');
    $routes->get('edit/(:num)', 'Books::edit/$1');
    $routes->post('update/(:num)', 'Books::update/$1');
    $routes->post('delete/(:num)', 'Books::delete/$1');
});
