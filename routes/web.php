<?php
// phpcs:disable
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
// phpcs:enable
Route::get(
    '/',
    function (Request $request) {
        $find = $request->input('search');
        $name = "Roman";
        $grout_all = null;
        $search = null;
        $starlike = App\Models\Grouts::where('name', 'like', '%star%')->get();
        $litokol = App\Models\Grouts::where('name', 'like', '%lito%')->get();
        $ceresit = App\Models\Grouts::where('plant', 'like', '%хенкель%')->get();
        $osnovit = App\Models\Grouts::where('plant', 'like', '%седрус%')->get();
        $mapei = App\Models\Grouts::where('plant', 'like', '%мапеи%')->get();
        $axton = App\Models\Grouts::where('name', 'like', '%axton%')->get();

        if (isset($_GET["search"])) {
            $search = $_GET["search"];
        }

        if ($find) {
            $grout_all = App\Models\Grouts::where('color', 'like', '%' . $find . '%')->orderBy('article', 'asc')->get();
            $starlike = null;
            $litokol = null;
            $ceresit = null;
            $osnovit = null;
            $mapei = null;
            $axton = null;
        }


        return view(
            'main',
            [
                'name' => $name, 'grout_all' => $grout_all,
                'litokol' => $litokol, 'ceresit' => $ceresit,
                'osnovit' => $osnovit, 'mapei' => $mapei, 'axton' => $axton,
                'starlike' => $starlike, 'search' => $search,
            ]
        );
    }
);

Route::get(
    '/test',
    function (Request $request) {
        $article = $request->input('article');
        $name = $request->input('name');
        $plant = $request->input('plant');
        $color = $request->input('color');

        $grout_insert = App\Models\Grouts::insert(
            [
                'article' => $article,
                'name' => $name, 'plant' => $plant, 'color' => $color
            ]
        );
        return view('test');
    }
);

Route::get('/auth', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
