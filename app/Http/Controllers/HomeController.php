<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use App\Models\Course;
use App\Models\Category;
use App\Models\Question;
use App\Models\Reference;
use App\Models\CourseUser;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $id =auth()->user()->id;

        $courses = Course::with(['references','students','coursesvalidate', 'coursesinvalidate'])->get();
  
        return view('allcourses',compact(['courses']));
    }


    public function showCourse(request $request,$slug)
    {
        $course = Course::with('references','questions')->where('slug',$slug)->first();
        $questions = Question::where('course_id',$course->id)->limit(5)->get();
        
        foreach ($questions as &$question) {
            $question->reponses = Reponse::where('question_id', $question->id)->get();
        }

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
