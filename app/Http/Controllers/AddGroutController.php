<?php
// phpcs:disable
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AddGroutController extends Controller
{
    public function addGrout(Request $request)
    {

        $this->validate($request, [
            'article' => 'required|numeric',
            'name' => 'required',
            'plant' => 'required',
            'color' => 'required|alpha'
        ], [
            'article.required' => 'Поле Название статьи обязательно для заполнения',
            'name.required'  => 'Поле Текст статьи обязательно для заполнения',
            'plant.required' => 'Поле Дата публикации имеет неверный формат',
            'color.required' => 'Инвалид'
        ]);

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
}
