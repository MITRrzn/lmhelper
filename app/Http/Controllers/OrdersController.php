<?php
// phpcs:disable
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;



class OrdersController extends Controller
{

    public function show()
    {
        // phpcs:enable
        $search = null;


        $grouts = DB::table('grouts')->get();
        $name = "Roman";

        return view(
            'orders',
            [
                'name' => $name, 'grouts' => $grouts,
                'search' => $search,
            ]
        );
    }
}
