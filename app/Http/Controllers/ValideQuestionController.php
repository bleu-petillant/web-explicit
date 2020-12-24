<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;

class ValideQuestionController extends Controller
{
    public function __construct()
    {
        
    }

    public function checkIfValide(Request $request)
    {
        $id = $request->question_id;
        $reponse_done =  $request->r;
        $reponses = Reponse::where('question_id',$id)->where('correct',1)->first();

        if($reponse_done == 4)
        {
           $reponse = "correct";
        }else{
            $reponse = $reponse_done;
        }
        
        return  $reponse;
    }
}
