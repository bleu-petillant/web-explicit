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
        if ($request->ajax()) {

        $id = $request->question_id;
        $reponse_done =  $request->r;
        $course_id = $request->course_id;
        $currentQ = $request->position;
        

        $course = Course::where('id',$course_id)->first();
        $user = auth()->user();
        $validate = $course->with('coursesvalidate')->first();
        $unvalidate = $course->with('coursesinvalidate')->first();
        $Course_user = $course->users()->first();

        $CurrQ = $Course_user->pivot->question_position;
        $CourseActivate = $Course_user->pivot->activated;
        $CourseValidate = $Course_user->pivot->validate;
    

        
        $nextCourse = Course::with('references')->where('id',$course_id +1)->first();

        if($nextCourse == null){
            $nextCourse =  Course::with('references')->where('id','!=',$course_id)->first();
        }

        $totalQ = Question::where('course_id',$course_id)->count();
        $start = 1;
        $end = $totalQ -1;
        $nextQ = $CurrQ +1;
        
        $collection = count($reponse_done);
        $total_bonne_reponse = 0;
             
            // compte le nombre de résultat pour la question dont les réponses sont correct
            $reponsescount = Reponse::where('question_id',$id)
            ->where('correct',1)
            ->count();

            $reponses_id = Reponse::where('question_id',$id)
            ->where('correct',1)
            ->get();


        foreach ($reponses_id as $reponse) {

          foreach ($reponse_done as $value) {
            if($reponse->id == $value){
                $total_bonne_reponse++;
            }
           
          }
           

        }


           
        if($reponsescount === $collection )
        {
            if($total_bonne_reponse === $reponsescount)
            {

                 // si  l'étudient arrive au bout et fini la formation et que c'est pas valider
                if($CurrQ == $totalQ && $CourseValidate == 0)
                {
               
                    $course->users()->updateExistingPivot($user,['activated'=>0,'question_position'=>$start,'validate'=>1],true);
                 
                    if($nextCourse){
                          
                        
                        return Response::json($nextCourse);

                    }
                    else{
                      
                       $nextCourse = Course::with('references')->where('id','!=',$course_id)->first();
                        return Response::json($nextCourse);
                    }
                   
                }else if($CurrQ == $totalQ && $CourseValidate == 1)
                {
  
                   $course->users()->updateExistingPivot($user,['activated'=>0,'question_position' => $start],true);

                    if($nextCourse){

                        return Response::json($nextCourse);

                    }
                    else{
                      
                       $nextCourse = Course::with('references')->where('id','!=',$course_id)->first();
                       return Response::json($nextCourse);
                    }
                   
                }else if($CurrQ <  $totalQ )
                {
                    $course->users()->updateExistingPivot($user,['activated'=>1,'question_position' => $nextQ],true);
                    return'correct';
                }
                

            }else{
                return 'erreur';
                // envoie les references
            }
            
        }else if($reponsescount < $collection)
        {
            return 'erreur';
            // envoie les references
        }else
        {
            return 'erreur';
        }
                

    }
    abort(404);
}
    

    public function GetData(Request $request)
    {
        if ($request->ajax()) {
            $course_id = $request->course_id;
            $question_pos = Question::where('course_id',$course_id)->where('question_position','')->get();
    
            if($question_pos)
            {
                return Response::json($question_pos);
            }else{
                return 'pas de question pour ce cours';
            }
            
        }
        abort(404);
    }
}

