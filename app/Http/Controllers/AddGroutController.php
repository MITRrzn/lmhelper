<?php
// phpcs:disable
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AddGroutController extends Controller
{
    public function addGrout(Request $request)
    {
        $article = $request->input('article');
        $name = $request->input('name');
        $plant = $request->input('plant');
        $color = $request->input('color');

        DB::table('grouts')->insert(
            [
                'article' => $article,
                'name' => $name,
                'plant' => $plant,
                'color' => $color,
            ]
        );

        return redirect('/test');
    }

    public function updateGrout(Request $request)
    {
        $id = $request->input('id');
        $article = $request->input('article');
        $name = $request->input('name');
        $plant = $request->input('plant');
        $color = $request->input('color');

        DB::table('grouts')
            ->where('id', 1)
            ->update(['color' => $color]);
    }
}
