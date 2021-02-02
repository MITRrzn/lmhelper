<?php
// phpcs:disable
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class OrdersController extends Controller
{

    public function show()
    {
        // phpcs:enable
        $search = null;



        $name = "Roman";

        $all = DB::table('orders')->paginate(50);

        $page_title = "Заказы";

        return view(
            'orders',
            [
                'name' => $name, 'search' => $search,
                'title' => $page_title, 'all' => $all,

            ]
        );
    }

    public function addOrder(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $article = $request->input('article');
        $note = $request->input('note');

        DB::table('orders')->insert(
            [
                'customer_name' => $name,
                'customer_phone' => $phone,
                'article' => $article,
                'note' => $note,
            ]
        );
    }
}
