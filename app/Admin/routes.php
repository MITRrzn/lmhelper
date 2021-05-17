<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UserController::class);
    $router->resource('grouts', GroutController::class);
    $router->resource('orders', OrdersController::class);
    $router->resource('products', ProductsController::class);
    $router->resource('departments', DepartmentsController::class);
    $router->resource('reg_users', reg_user::class);
});
