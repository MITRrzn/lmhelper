<?php
// phpcs:disable
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AddGroutController;

Auth::routes();
// phpcs:enable
Route::get(
    '/test',
    function () {
        return view('test');
    }
)->name('test');

Route::get('/', 'App\Http\Controllers\GroutController@show')->name('grout_page');

Route::post('/add', 'App\Http\Controllers\AddGroutController@addGrout')->name('addgrout');

Route::get('/orders', 'App\Http\Controllers\OrdersController@show')->name('orders');

Route::post('/addorder', 'App\Http\Controllers\OrdersController@addOrder')->name('addorder');

Route::get('/auth', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // phpcs:disable
