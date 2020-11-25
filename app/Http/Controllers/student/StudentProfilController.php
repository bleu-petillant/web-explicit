<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentProfilController extends Controller
{
    public function dashboard()
    {
        return view('student.dashboard');
    }
}
