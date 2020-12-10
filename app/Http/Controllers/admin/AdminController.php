<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

}
