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

Route::get(
    '/', function (Request $request) {

        $user = Auth::user();

        
        $find = $request->input('search');
        $name = "Roman";
        $grout_all = null;
        $search =null;
        $starlike = App\Models\Grouts::where('name', 'like', '%star%')->paginate(100);
        $litokol = App\Models\Grouts::where('name', 'like', '%lito%')->Paginate(100);
        $ceresit = App\Models\Grouts::where('plant', 'like', '%хенкель%')->Paginate(100);
        $osnovit = App\Models\Grouts::where('plant', 'like', '%седрус%')->Paginate(100);
        $mapei = App\Models\Grouts::where('plant', 'like', '%мапеи%')->Paginate(100);
        $axton = App\Models\Grouts::where('name', 'like', '%axton%')->Paginate(100);
    

        if (isset($_GET["search"])) {
            $search = $_GET["search"];
        }

        if ($find) {
            $grout_all = App\Models\Grouts::where('color', 'like', '%' . $find . '%')->Paginate(10);
            $starlike = null;
            $litokol = null;
            $ceresit = null;
            $osnovit = null;
            $mapei = null;
            $axton = null; 
        }
    
        
        return view(
            'main', ['name'=>$name, 'grout_all'=>$grout_all,
            'litokol'=>$litokol, 'ceresit'=>$ceresit,
            'osnovit'=>$osnovit, 'mapei'=>$mapei, 'axton'=>$axton,
            'starlike'=>$starlike, 'search'=>$search]
        );
    }
);

Route::get(
    '/test', function (Request $request) {
        $user = Auth::user();
        $article = $request->input('article');
        $name = $request->input('name');
        $plant = $request->input('plant');
        $color = $request->input('color');
        $grout_insert = App\Models\Grouts::insert(
            ['article' => $article,
            'name' => $name, 'plant'=>$plant, 'color'=>$color]
        );
        return view('test');
    }
);

Route::get('/auth', [App\Http\Controllers\HomeController::class, 'index'])->name('home');