<?php
// phpcs:disable
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GroutController extends Controller
{
    public function show(Request $request)
    {
        $find = $request->input('search');
        $grout_all = null;
        $search = null;
        $page_title = "Затирки";

        $ceresit = DB::table('grouts')->where('plant', 'like', '%хенкель%')->get();
        $starlike = DB::table('grouts')->where('name', 'like', '%star%')->get();
        $litokol = DB::table('grouts')->where('name', 'like', '%lito%')->get();
        $osnovit = DB::table('grouts')->where('plant', 'like', '%седрус%')->get();
        $mapei = DB::table('grouts')->where('plant', 'like', '%мапеи%')->get();
        $axton = DB::table('grouts')->where('name', 'like', '%axton%')->get();

        if (isset($_GET["search"])) {
            $search = $_GET["search"];
        }

        if ($find) {
            $grout_all = DB::table('grouts')->where(
                'color',
                'like',
                '%' . $find . '%'
            )->orderBy('article', 'asc')->get();

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
                'grout_all' => $grout_all,
                'litokol' => $litokol, 'ceresit' => $ceresit,
                'osnovit' => $osnovit, 'mapei' => $mapei, 'axton' => $axton,
                'starlike' => $starlike, 'search' => $search, 'title' => $page_title
            ]
        );
    }
}
