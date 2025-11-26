<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->resource('members', ['controller' => 'Members']);
$routes->resource('share-capital', ['controller' => 'ShareCapital']);
$routes->resource('loans', ['controller' => 'Loans']);

$routes->group('api/v1', ['namespace' => 'App\Controllers\Api\V1'], function($routes) {
    $routes->resource('members');
    $routes->resource('households');
    $routes->resource('properties');
    $routes->resource('vehicles');
    $routes->resource('skills');
    $routes->resource('beneficiaries');
    $routes->resource('cooperatives');
    $routes->resource('ids');
});

service('auth')->routes($routes);
