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

        $courses = Course::with(['students','coursesvalidate', 'coursesinvalidate','coursesnull','references'])->get();
  
        return view('allcourses',compact(['courses']));
    }


    public function showCourse($slug)
    {
        $course = Course::with('questions')->where('slug',$slug)->first();
        
        $total = Question::where('course_id',$course->id)->count();
        $questions = Question::with('reponses','references','reponsecorrect')
        ->where('course_id',$course->id)
        ->where('question_position',1)
        ->first();
     
        if($course && $questions)
        {
            return view('course',['course' => $course,'questions' => $questions,'total'=>$total]);
        }else
        {
            return redirect('/404');
        }


    }

    public function episode($slug,$episodeNumber)
    {
        $course = Course::with('questions')->where('slug',$slug)->first();
        if($episodeNumber == null){
        $questions = Question::with('reponses','references','reponsecorrect')
        ->where('course_id',$course->id)
        ->where('question_position',1)
        ->first();
        }


        $next_question = Question::with('reponses','references','reponsecorrect')
        ->where('course_id',$course->id)
        ->where('episode_number',$episodeNumber +1)
        ->first();
        

        if($course && $questions && $next_question)
        {
            return view('course',['course' => $course,'questions' => $questions,'next_quetion' => $next_question]);
        }elseif($next_question->count() < 1)
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
