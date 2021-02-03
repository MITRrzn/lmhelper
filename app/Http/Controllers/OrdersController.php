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

        $all = DB::table('orders')->paginate(50);



        $page_title = "Заказы";

        return view(
            'orders',
            [
                'search' => $search,
                'title' => $page_title, 'all' => $all,
            ]
        );
    }

    public function addOrder(Request $request) // phpcs:disable
    { // phpcs:enable
        $name = $request->input('name');
        $phone = $request->input('phone');
        $article = $request->input('article');
        $note = $request->input('note');
        $quantity = $request->input('quantity');
        $inner = $request->input('inner_order');

        DB::table('orders')->insert(
            [
                'customer_name' => $name,
                'customer_phone' => $phone,
                'article' => $article,
                'quantity' => $quantity,
                'inner_order' => $inner,
                'note' => $note,
            ]
        );
        return redirect('/orders');
    }

    public function findProduct(Request $request)
    {
        $article = $request->input('article');

        $find = DB::table('products')->where('article', '=', $article)->get();
    }

    public function deleteOrder($id)
    {
        DB::table('orders')->where('id', '=', $id)->delete();

        return redirect('/orders');
    }
}
