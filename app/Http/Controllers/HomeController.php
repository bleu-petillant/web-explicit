<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use App\Models\Course;
use App\Models\Category;
use App\Models\Question;
use App\Models\Reference;
use App\Models\Reponse;
use App\Models\User;
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
        
        $courses = Course::with(['coursesvalidate', 'coursesinvalidate','references'])->get();
        return view('allcourses',compact(['courses']));
    }

     
    public function showCourse($slug)
    {
       if($slug != null){

            $course = Course::with('questions')->where('slug',$slug)->first();
            $id = $course->id;
            $user = Auth::user();
            $user_id = $user->id;
            $total = Question::where('course_id',$course->id)->count();
            $validate = Course::find($id)->users()->first();


            if($validate == null )
            {
                $course->users()->attach($course,['course_id'=>$id,'user_id'=>$user_id,'activated'=>0,'question_position' => 1 ,'validate'=>0]);
                $validate = Course::find($id)->students()->first();
                $position = $validate->pivot->question_position;
            }else{
                $position = $validate->pivot->question_position;
            }


    
               
         
                $nextslug = Course::where('id', '>', $course->id)->orderBy('id','desc')->first();
                $total = Question::where('course_id',$course->id)->count();
                $questions = Question::with('reponses','references','reponsecorrect')
                ->where('course_id',$course->id)
                ->where('question_position',$position)
                ->first();
                if($course && $questions)
                {
                    return view('course',['course' => $course,'questions' => $questions,'total'=>$total,'nextslug'=>$nextslug,'position'=>$position]);
                }
            
        
    }else{
        return redirect('/nos formations');
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
