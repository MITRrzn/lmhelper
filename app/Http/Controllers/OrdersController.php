<?php
// phpcs:disable
namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class OrdersController extends Controller
{

    public function show()
    {
        // phpcs:enable
        $search = null;

        $all = DB::table('orders')
            ->orderBy('status', 'desc')
            ->orderBy('date', 'desc')
            ->paginate(25);

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

    public function detailOrder(Request $request, $id, $article, $inner_order) // phpcs:disable
    { // phpcs:enable
        $page_title = "Заказ № $id";
        $search = null;

        $order = Orders::find($id);

        $orderDetail = DB::table('orders')
            ->join('products', 'orders.article', '=', 'products.article')
            ->select(
                'orders.article',
                'products.article',
                'products.name',
                'products.EAN',
                'products.plant_id',
                'products.plant_name'
            )
            ->where('orders.article', '=', $article)
            ->where('orders.inner_order', '=', $inner_order)
            ->get();

        return view(
            'order-detail',
            [
                'order' => $order, 'title' => $page_title,
                'search' => $search, 'orderDetail' => $orderDetail
            ]
        );
    }

    public function deleteOrder($id) // phpcs:disable
    { // phpcs:enable
        DB::table('orders')->where('id', '=', $id)->delete();

        return redirect('/orders');
    }

    public function updateOrder(Request $request, $id) // phpcs:disable
    { // phpcs:enable
        $name = $request->input('name');
        $phone = $request->input('phone');
        $article = $request->input('article');
        $quantity = $request->input('quantity');
        $order_num = $request->input('order_num');
        $shipment_num = $request->input('shipment_num');
        $inner = $request->input('inner_order');
        $note = $request->input('note');

        DB::table('orders')
            ->where('id', '=', $id)
            ->update(
                [
                    'customer_name' => $name,
                    'customer_phone' => $phone,
                    'article' => $article,
                    'quantity' => $quantity,
                    'order_number' => $order_num,
                    'shipment_num' => $shipment_num,
                    'inner_order' => $inner,
                    'note' => $note,
                ]
            );
    }
}
