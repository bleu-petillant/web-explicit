<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;

class ValideQuestionController extends Controller
{


    public function checkIfValide(Request $request)
    {
        $id = $request->question_id;
        $reponse_done =  $request->r;

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

                return'correct';

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
}

