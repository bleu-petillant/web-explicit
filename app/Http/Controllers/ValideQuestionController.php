<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class ValideQuestionController extends Controller
{
    public function __construct()
    {
        
    }

    public function checkIfValide(Request $request,$id)
    {
        $question = Question::with('reponses')->where('question_id',$id)->first();
        $reponse_correct = $question->response_correct();
        $question = json_encode($question);
        return  $question;
    }
}
