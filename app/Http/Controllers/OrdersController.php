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
        $name = "roman";

        $grouts = DB::table('grouts')->get();

        return view(
            'orders',
            [
                'name' => $name, 'grouts' => $grouts,
                'search' => $search,
            ]
        );
    }
}
