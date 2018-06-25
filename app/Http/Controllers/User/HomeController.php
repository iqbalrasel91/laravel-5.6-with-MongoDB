<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{


    public function index()
    {

        $users = User::where('user_type', '=', 2)->get();
        $totalUsers = $users->count();

        $admin = User::where('user_type', '=', 1)->get();
        $totalAdmin = $admin->count();

        $data=[
            'totalUsers'=>$totalUsers,
            'totalAdmin'=>$totalAdmin,
        ];

        return view('admin.adminHome')->with($data);
    }

}
