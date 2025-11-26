<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

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

$routes->group('docs', ['namespace' => 'App\Controllers\Docs'], function($routes) {
    $routes->get('v1', 'DocsV1::index');
    $routes->get('v1/openapi', 'DocsV1::openapi');
});


service('auth')->routes($routes);
