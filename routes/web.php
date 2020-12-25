<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
Auth::routes();


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $user = Auth::user();

    $name = "Roman";
    $grout = App\Models\Grout::all();
    

    return view('main',['name'=>$name, 'grout'=>$grout]);
});


Route::get('/auth', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

