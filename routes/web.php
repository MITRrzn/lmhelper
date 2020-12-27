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

Route::get('/', function (Request $request) {

    $user = Auth::user();

    $find = $request->input('search');
    $name = "Roman";
    $grout_all = App\Models\Grouts::all();

    if ($find) {
        $grout_all = App\Models\Grouts::where('color', 'like', '%' . $find . '%')->Paginate(10);
    }
   
    

    return view('main',['name'=>$name, 'grout_all'=>$grout_all]);
});


Route::get('/auth', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

