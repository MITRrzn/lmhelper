<?php
// phpcs:disable
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Encore\Admin\Form\Row;

Auth::routes();
// Auth routes
Route::get(
    '/auth/new_user',
    'App\Http\Controllers\Auth\RegisterController@showRegistrationForm'
)
    ->name('register');

Route::post(
    '/auth/new_user',
    'App\Http\Controllers\Auth\RegisterController@register'
);

Route::get(
    '/auth/password/reset',
    'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm'
);

Route::post(
    '/auth/password/email',
    'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail'
);

Route::get(
    '/auth/password/reset/{token}',
    'App\Http\Controllers\Auth\ResetPasswordController@showResetForm'
);
Route::post(
    '/auth/password/reset',
    'App\Http\Controllers\Auth\ResetPasswordController@reset'
);

Route::get(
    '/logout',
    'App\Http\Controllers\Auth\LoginController@logout'
)
    ->name('logout');
//Auth routes end


// phpcs:enable
Route::get(
    '/test',
    function () {
        return view('test');
    }
)->name('test');

Route::get('/auth', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // phpcs:disable


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
    ->name('detailOrder');

Route::delete(
    '/delete/{id}',
    'App\Http\Controllers\OrdersController@deleteOrder'
)
    ->name('deleteOrder');

Route::post(
    '/update/{id}',
    'App\Http\Controllers\OrdersController@updateOrder'
)
    ->name('updateOrder');

Route::get(
    '/account',
    'App\Http\Controllers\accountController@show'
)
    ->name('account');
