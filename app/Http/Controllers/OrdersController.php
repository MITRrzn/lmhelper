<?php
// phpcs:disable
namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;





class OrdersController extends Controller
{

    public function show(Request $request)
    {
        // phpcs:enable
        $user = Auth::user();
        $page_title = "Заказы";
        $search = null;


        $find = $request->input('search');


        if (isset($_GET["search"])) {
            $search = $_GET["search"];
        }

        $todo_orders = DB::table('orders')
            ->where(
                'status',
                '=',
                1
            )
            ->where(
                'departmentID',
                '=',
                Auth::user()->departmentID
            )->get();


        $order_list = DB::table('orders')
            ->leftJoin('statuses', 'orders.status', '=', 'statuses.id')
            ->select(
                'orders.id',
                'orders.customer_name',
                'orders.customer_phone',
                'orders.order_number',
                'orders.article',
                'orders.inner_order',
                'orders.date',
                'orders.is_show',
                'statuses.status_value',
            )
            ->where('orders.is_show', '=', 1)
            ->orderBy('status', 'asc')
            ->orderBy('date', 'desc')
            ->paginate(25);

        if ($find) {
            $order_list = DB::table('orders')
                ->leftJoin('statuses', 'orders.status', '=', 'statuses.id')
                ->select(
                    'orders.id',
                    'orders.customer_name',
                    'orders.customer_phone',
                    'orders.order_number',
                    'orders.inner_order',
                    'orders.article',
                    'orders.inner_order',
                    'orders.date',
                    'orders.is_show',
                    'statuses.status_value',
                )
                ->where('orders.is_show', '=', 1)
                ->where(function ($query) use ($find) {
                    $query->where(
                        'orders.customer_name',
                        'like',
                        '%' . $find . '%'
                    )
                        ->orWhere(
                            'orders.customer_phone',
                            'like',
                            '%' . $find . '%'
                        )
                        ->orWhere(
                            'orders.inner_order',
                            'like',
                            '%' . $find . '%'
                        );
                })
                ->orderBy('date', 'asc')->get();
        }


        return view(
            'orders',
            [
                'search' => $search,
                'title' => $page_title, 'order_list' => $order_list,
                'user' => $user, 'todo_orders' => $todo_orders,
            ]
        );
    }

    public function addOrder(Request $request) // phpcs:disable
    { // phpcs:enable

        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha_spaces',
            'phone' => 'required|phone_num',
            'article' => 'required|numeric|digits_between:5,8',
            'quantity' => 'required|numeric',
            'inner_order' => 'required|numeric|digits:12',
            'note' => 'nullable',
        ]);

        if ($validator->passes()) {
            $name = $request->input('name');
            $phone = $request->input('phone');
            $article = $request->input('article');
            $quantity = $request->input('quantity');
            $inner = $request->input('inner_order');
            $note = $request->input('note');
            $departmentID = Auth::user()->departmentID;
            $created_by = Auth::user()->name;


            DB::table('orders')->insert(
                [
                    'customer_name' => $name,
                    'customer_phone' => $phone,
                    'article' => $article,
                    'quantity' => $quantity,
                    'inner_order' => $inner,
                    'note' => $note,
                    'departmentID' => $departmentID,
                    'created_by' => $created_by,
                ]
            );

            return response()->json(['success' => 'Added new records.']);
        }

        return response()->json(['error' => $validator->errors()]);
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
        DB::table('orders')
            ->where('id', '=', $id)
            ->update(["is_show" => 0]);

        return redirect('/orders');
    }

    public function updateOrder(Request $request, $id) // phpcs:disable
    { // phpcs:enable


        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'name' => 'required|alpha_spaces',
            'phone' => 'required|phone_num',
            'quantity' => 'required|numeric',
            'order_number' => 'nullable|numeric',
            'shipment_num' => 'nullable|numeric',
            'inner_order' => 'required|numeric|digits:12',
        ]);

        if ($validator->passes()) {

            $order = Orders::find($id);
            $order->status = $request->input('status');
            $order->customer_name = $request->input('name');
            $order->customer_phone = request('phone');
            $order->quantity = request('quantity');
            $order->order_number = request('order_number');
            $order->shipment_num = request('shipment_num');
            $order->inner_order = request('inner_order');
            $order->note = request('note');

            $order->save();

            return response()->json(['success' => 'SUCCESS!!']);
        }

        return response()->json(['error' => $validator->errors()]);

        // return back();
    }
}
