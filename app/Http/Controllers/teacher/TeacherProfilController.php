<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherProfilController extends Controller
{
    public function dashboard()
    {
        return view('teacher.dashboard');
    }
}
