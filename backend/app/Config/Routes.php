<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Handle all OPTIONS requests globally (required for CORS)
$routes->options('(:any)', function () {
    return service('response')
        ->setStatusCode(200)
        ->setHeader('Access-Control-Allow-Origin', 'http://localhost:5173')
        ->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
        ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')
        ->setHeader('Access-Control-Allow-Credentials', 'true')
        ->setBody('');
});

$routes->get('/', 'Home::index');

$routes->group('api/v1', ['namespace' => 'App\Controllers\Api\V1'], function($routes) {
    $routes->get('overview', 'Overview::index');
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

$routes->setAutoRoute(true);

service('auth')->routes($routes);
