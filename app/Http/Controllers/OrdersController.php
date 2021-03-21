<?php
// phpcs:disable
namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class OrdersController extends Controller
{

    public function show(Request $request)
    {
        // phpcs:enable
        $page_title = "Заказы";
        $search = null;

        $find = $request->input('search');
        // $findBy = $request->input('findBy');

        if (isset($_GET["search"])) {
            $search = $_GET["search"];
        }


        // $all = DB::table('orders')
        //     ->orderBy('status', 'asc')
        //     ->orderBy('date', 'desc')
        //     ->paginate(25);

        $all = DB::table('orders')
            ->leftJoin('statuses', 'orders.status', '=', 'statuses.id')
            ->select(
                'orders.id',
                'orders.customer_name',
                'orders.customer_phone',
                'orders.order_number',
                'orders.article',
                'orders.inner_order',
                'orders.date',
                'statuses.status_value',
            )
            ->orderBy('status', 'asc')
            ->orderBy('date', 'desc')
            ->paginate(25);

        if ($find) {
            $all = DB::table('orders')->where(
                'customer_name',
                'like',
                '%' . $find . '%'
            )
                ->orWhere(
                    'customer_phone',
                    'like',
                    '%' . $find . '%'
                )
                ->orderBy('date', 'asc')->get();
        }


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

        $this->validate(
            $request,
            [
                'name' => 'required|alpha',
                'phone' => 'required',
                // 'phone' => ['required', 'regex:/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$'],
                'article' => 'required|numeric|digits_between:5,8',
                'quantity' => 'required|numeric',
                'inner_order' => 'required|numeric|digits:12',
            ],
            [
                'name.required'  => 'Введите имя клиента',
                'name.alpha' => 'Имя должно содержать только буквы',

                'phone.required' => 'Введите номер телефона',
                // 'phone.regex' => 'Введите номер телефона в формате +7 (XXX) XXX-XX-XX',

                'article.required' => 'Введите LM код товара',
                'article.numeric' => 'LM код должен содержать только цифры',
                'article.digits_between' => 'LM код должен быть длиной от 5 до 8 цифр',

                'quantity.required' => 'Введите количество',
                'quantity.numeric' => 'Количество должно состоять из цифр',

                'inner_order.required' => 'Введите № заказа',
                'inner_order.numeric' => 'Номер должен состоять из цифр',
                'inner_order.digits' => 'Номер заказа должен состоять из 12 цифр',
            ]
        );


        $name = $request->input('name');
        $phone = $request->input('phone');
        $article = $request->input('article');
        $quantity = $request->input('quantity');
        $inner = $request->input('inner_order');
        $note = $request->input('note');


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

    public function detailOrder($id, $article, $inner_order) // phpcs:disable
    { // phpcs:enable
        $page_title = "Заказ № $id";
        $search = null;

        $user = Auth::user();

        $order = Orders::find($id);


        $orderDetail = DB::table('orders')
            ->leftJoin('products', 'orders.article', '=', 'products.article')
            ->leftJoin('statuses', 'orders.status', '=', 'statuses.id')
            ->select(
                'orders.article',
                'orders.inner_order',
                'orders.shipment_num',
                'orders.order_number',
                'products.article',
                'products.name',
                'products.EAN',
                'products.plant_id',
                'products.plant_name',
                'statuses.status_value'
            )
            ->where('orders.article', '=', $article)
            ->where('orders.inner_order', '=', $inner_order)
            ->get();

        $status = get_object_vars($orderDetail[0])["status_value"];
        $status_list = DB::table('statuses')
            ->select('id', 'status_value')
            ->where('status_value', '!=', $status)
            ->get();





        return view(
            'order-detail',
            [
                'order' => $order, 'title' => $page_title,
                'search' => $search, 'orderDetail' => $orderDetail,
                'user' => $user, 'status_list' => $status_list,
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
        $order = Orders::find($id);
        $order->status = $request->input('status');
        $order->customer_name = $request->input('name');
        $order->customer_phone = request('phone');
        $order->quantity = request('quantity');
        $order->order_number = request('order_num');
        $order->shipment_num = request('shipment_num');
        $order->inner_order = request('inner_order');
        $order->note = request('note');

        $order->save();

        return redirect('/orders');
    }
}
