<?php
// phpcs:disable
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Encore\Admin\Form\Row;

use App\Http\Controllers\ProjectsController;


Route::get(
    'login',
    'App\Http\Controllers\Auth\LoginController@showLoginForm'
)
    ->name('login');

Route::post(
    'login',
    'App\Http\Controllers\Auth\LoginController@login'
);

Route::get(
    '/auth/new_user',
    'App\Http\Controllers\Auth\RegisterController@index'
)
    ->middleware('auth')
    ->name('register');

Route::post(
    '/auth/new_user',
    'App\Http\Controllers\Auth\RegisterController@register'
)
    ->middleware('auth')
    ->name('register');

// Password reset link request routes...
Route::get(
    '/auth/email',
    'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm'
)
    ->name('password.email');
Route::post(
    '/auth/email',
    'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail'
);

// Password reset routes...
Route::get(
    '/auth/reset/{token}',
    'App\Http\Controllers\Auth\ResetPasswordController@showResetForm'
)
    ->name('password.request');
Route::post(
    '/auth/reset',
    'Auth\ResetPasswordController@postReset'
)
    ->name('password.reset');

Route::get(
    '/logout',
    'App\Http\Controllers\Auth\LoginController@logout'
)
    ->name('logout');
//Auth routes end


// phpcs:enable

// phpcs:disable


//grouts routes

Route::get(
    '/',
    'App\Http\Controllers\GroutController@show'
)
    ->middleware('auth')
    ->name('grout_page');

Route::post(
    '/add',
    'App\Http\Controllers\AddGroutController@addGrout'
)
    ->name('addgrout');

Route::get(
    '/updateGrout',
    'App\Http\Controllers\AddGroutController@updateGrout'
);

//orders routes

Route::get(
    '/orders',
    'App\Http\Controllers\OrdersController@show'
)
    ->middleware('auth')
    ->name('orders');

Route::post(
    '/addorder',
    'App\Http\Controllers\OrdersController@addOrder'
)
    ->middleware('auth')
    ->name('addorder');

//order details routes

Route::get(
    '/orders/{id}_{article}_{inner_order}',
    'App\Http\Controllers\OrdersController@detailOrder'
)
    ->middleware('auth')
    ->name('detailOrder');

Route::delete(
    '/delete/{id}',
    'App\Http\Controllers\OrdersController@deleteOrder'
)
    ->middleware('auth')
    ->name('deleteOrder');

Route::post(
    '/update/{id}',
    'App\Http\Controllers\OrdersController@updateOrder'
)
    ->middleware('auth')
    ->name('updateOrder');

Route::get(
    '/account',
    'App\Http\Controllers\accountController@show'
)
    ->middleware('auth')
    ->name('account');


Route::get(
    '/projects',
    [ProjectsController::class, 'show']
)
    ->name('projects');
