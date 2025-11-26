<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->resource('members', ['controller' => 'Members']);
$routes->resource('share-capital', ['controller' => 'ShareCapital']);
$routes->resource('loans', ['controller' => 'Loans']);

service('auth')->routes($routes);
