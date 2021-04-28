<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class accountController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $page_title = "Страница пользователя";
        $search = NULL;
        return view(
            'account',
            [
                'user' => $user,
                'title' => $page_title,
                'search' => $search,
            ]
        );
    }
}
