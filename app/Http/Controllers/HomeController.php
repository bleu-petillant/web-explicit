<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Resources;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function allResources()
    {
        return view('allresources');
    }

    public function allCourse()
    {
        return view('allcourse');
    }

    public function showResources(request $request,$slug)
    {
        return view('resources');
    }

    public function showCourse(request $request,$slug)
    {
        $course = Course::with('category','resources')->where('slug',$slug)->first();
        $references = Resources::with('category')->where('id','=',$course->id)->get();
        $categories = Category::all();
        if($course)
        {
            return view('course',compact(['course','references','categories']));
        }else
        {
            return redirect('/404');
        }


    }
}
