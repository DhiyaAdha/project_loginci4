<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
    
 

$routes->get('/', 'Frontend::index');
$routes->get('/register', 'Frontend::register');
$routes->post('auth/register', 'Auth::register');
