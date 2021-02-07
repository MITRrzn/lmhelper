<?php
// phpcs:disable
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AddGroutController;
use Encore\Admin\Form\Row;

Auth::routes();
// phpcs:enable
Route::get(
    '/test',
    function () {
        return view('test');
    }
)->name('test');

Route::get('/auth', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // phpcs:disable

Route::get('/', 'App\Http\Controllers\GroutController@show')->name('grout_page');

Route::get(
    '/add',
    'App\Http\Controllers\AddGroutController@addGrout'
)
    ->name('addgrout');

Route::get(
    '/updateGrout',
    'App\Http\Controllers\AddGroutController@updateGrout'
);

Route::get(
    '/orders',
    'App\Http\Controllers\OrdersController@show'
)
    ->name('orders');

Route::post(
    '/addorder',
    'App\Http\Controllers\OrdersController@addOrder'
)
    ->name('addorder');

Route::get(
    '/orders/{id}_{article}_{inner_order}',
    'App\Http\Controllers\OrdersController@detailOrder'
)
    ->name('detailOrder');

Route::get(
    '/delete/{id}',
    'App\Http\Controllers\OrdersController@deleteOrder'
)
    ->name('deleteOrder');

Route::get(
    '/update/{id}',
    'App\Http\Controllers\OrdersController@updateOrder'
)
    ->name('updateOrder');
