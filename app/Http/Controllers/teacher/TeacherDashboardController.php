<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Routing\Controller;


class TeacherDashboardController extends Controller
{

    public function __construct()
    {
       $this->middleware('teacher');
    }

    public function dashboard()
    {
        return view('teacher.dashboard');
    }


}
