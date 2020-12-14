<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Reference;
use App\Models\Usage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories =  Category::all();
        $references = Reference::with('category')->with('tagged')->orderBy('created_at','DESC')->take(4)->get();
        $usages = Usage::orderBy('created_at','DESC')->take(3)->get();
        return view('index',compact('references','categories','usages'));
    }
    public function usage()
    {
        $usages = Usage::all();
        return view('usage',compact('usages'));
    }
    public function contact()
    {
        return view('contact');
    }


    public function allResources()
    {
        $references = Reference::with('category')->with('tagged')->orderBy('created_at','DESC')->get();
        $categories = Category::all();
        return view('resources',compact('references','categories'));
    }

    public function allCourses()
    {
        $courses = Course::all();
        return view('allcourses',compact('courses'));
    }

    public function showResources(request $request,$slug)
    {
       $references = Reference::with('category')->orderBy('created_at','DESC')->take(4)->get();
       $categories = Category::all();
        if($references)
        {
           
            return view('resources',compact('reference'));
        }else
        {
         
            return redirect('/404');
        }

    }

    public function showCourse(request $request,$slug)
    {
        $course = Course::with('category','references')->where('slug',$slug)->first();
        $references = Reference::with('category')->where('id','=',$course->id)->get();
        if($course)
        {
            return view('course',compact(['course','references']));
        }else
        {
            return redirect('/404');
        }


    }

    public function policies()
    {
        return view('police de confidentialite');
    }

    public function mentions()
    {
        return view('mentions');
    }
}
