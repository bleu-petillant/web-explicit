<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Reponse;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ValideQuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function checkTheAnswers(Request $request)
    {
        // request must be in ajax else send an error;
    if ($request->ajax()) {

        $id = $request->question_id;
        $reponse_done =  $request->r;
        $course_id = $request->course_id;

        
        // get the actual course;
        $course = Course::where('id',$course_id)->with('references')->first();


        // try to get next course if exist;
        $Ncourse = Course::where('id','!=',$course_id)->with('references')->first();

        $user = auth()->user();
        $Course_user = $course->users()->first();
        
        // if next course is already validate , try to get next course where is no validate;
        $courses_all = Course::with(['references'])->whereDoesntHave('users', function($q) use ($id){
            $q->where('user_id', $id);
        })->get();

        //get the indices if answer is false;
        $indice = Question::where('id',$id)->first();

        // get the current position off the question;
        $CurrQ = $Course_user->pivot->question_position;

        // get all the courses where is validate by the student;
        $CourseValidate = $Course_user->pivot->validate;


        // get the total questions in this course;
        $totalQ = Question::where('course_id',$course_id)->count();
        $start = 1;
        //get the next question;
        $nextQ = $CurrQ +1;
        
        $collection = count($reponse_done);
        $total_bonne_reponse = 0;
             
            // count the number of anwer where is correct;
            $reponsescount = Reponse::where('question_id',$id)
            ->where('correct',1)
            ->count();
        // get all anwer relative to this question where is correct;
            $reponses_id = Reponse::where('question_id',$id)
            ->where('correct',1)
            ->get();

        // compare all answer correct send by the student / with all answer correct  in database;
        foreach ($reponses_id as $reponse) {

          foreach ($reponse_done as $value) {
            if($reponse->id == $value){
                $total_bonne_reponse++;
            }
           
          }
           

        }


           // if the total of the answer for this question is the same of the answer send by the student , then we can past to the next step check ;
        if($reponsescount === $collection )
        {
            // if the total correct answer send by the student is the same as the  total answer correct for this question in the bdd, then the answer is correct , next question;
            if($total_bonne_reponse === $reponsescount)
            {
                 // if the current question is the same of the total question , then the course is finished and validate, then  the student  passed to the next course;
                if($CurrQ == $totalQ && $CourseValidate == 0)
                {
               
                    $course->users()->updateExistingPivot($user,['activated'=>0,'question_position'=>$start,'validate'=>1],true);
                    $nextCourse = $courses_all->where('id','!=',$course_id)->first();
                    if($nextCourse){
                          
                        return response()->json(['status'=>'next',$course,$nextCourse]);

                    }
                    else{
                      

                        return response()->json(['status'=>'other',$course,$Ncourse]);
                    }
                   
                }else if($CurrQ == $totalQ && $CourseValidate == 1)
                {
  
                   $course->users()->updateExistingPivot($user,['activated'=>0,'question_position' => $start],true);
                    $nextCourse = $courses_all->where('id','!=',$course_id)->first();
                    if($nextCourse){

                       return response()->json(['status'=>'next',$course,$nextCourse]);

                    }
                    else{
                      
                        return response()->json(['status'=>'other',$course,$Ncourse]);
                    }
                   
                }else if($CurrQ <  $totalQ )
                {// answer is true  and we have more question in this course , student past to the next question;
                    $course->users()->updateExistingPivot($user,['activated'=>1,'question_position' => $nextQ],true);
                    return response()->json(['status'=>'correct',$course]);
                }
                

            }else{  //answer is false for this question , it's an error , send the indice;
                 return response()->json(['status'=>'error',$course,$indice]);
    
            }
            
        }else if($reponsescount < $collection)
        {   // no enought answer for this question , it's an error, send the indice;
            return response()->json(['status'=>'error',$course,$indice]);
           
        }else
        { // answer is false or an error is coming , send the indice;
            return response()->json(['status'=>'error',$course,$indice]);
        }
                

    }
    abort(404);
}


    
}

