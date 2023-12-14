<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [\App\Controllers\DashboardController::class, 'index']);

$routes->group('position', static function ($routes) {
    $routes->get('', [\App\Controllers\PositionController::class, 'index']);
    $routes->get('create', [\App\Controllers\PositionController::class, 'create']);
    $routes->post('create', [\App\Controllers\PositionController::class, 'store']);
    $routes->get('edit/(:num)', [\App\Controllers\PositionController::class, 'edit/$1']);
    $routes->post('edit/(:num)', [\App\Controllers\PositionController::class, 'update/$1']);
    $routes->get('delete/(:num)', [\App\Controllers\PositionController::class, 'delete/$1']);
});

$routes->group('attendance', static function ($routes) {
    $routes->get('', [\App\Controllers\AttendanceController::class, 'index']);
    $routes->get('create', [\App\Controllers\AttendanceController::class, 'create']);
    $routes->post('create', [\App\Controllers\AttendanceController::class, 'store']);
    $routes->get('edit/(:num)', [\App\Controllers\AttendanceController::class, 'edit/$1']);
    $routes->post('edit/(:num)', [\App\Controllers\AttendanceController::class, 'update/$1']);
    $routes->get('delete/(:num)', [\App\Controllers\AttendanceController::class, 'delete/$1']);
});

$routes->group('employee', static function ($routes) {
    $routes->get('', [\App\Controllers\EmployeeController::class, 'index']);
    $routes->get('create', [\App\Controllers\EmployeeController::class, 'create']);
    $routes->post('create', [\App\Controllers\EmployeeController::class, 'store']);
    $routes->get('edit/(:num)', [\App\Controllers\EmployeeController::class, 'edit/$1']);
    $routes->post('edit/(:num)', [\App\Controllers\EmployeeController::class, 'update/$1']);
    $routes->get('delete/(:num)', [\App\Controllers\EmployeeController::class, 'delete/$1']);
});
