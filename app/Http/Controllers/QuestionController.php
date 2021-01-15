<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Reponse;
use App\Models\Question;
use App\Models\Reference;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['super']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $questions = Question::with(['reponses','course','reponsecorrect'])->get();
       // $reponses = Reponse::with('question')->get();
        return view('admin.questions.index',compact(['questions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::with('questions','users')->get();
        $questions =Question::all();
        $references = Reference::all();
        $reponses = Reponse::all();
    

        return view('admin.questions.create', compact(['reponses','courses','references','questions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = $request->input('course');
        $last_question_pos = question::where('course_id',$id)->latest('question_position')->first();
        if($last_question_pos != null){
            if($last_question_pos->count() > 0){
                $positions = $last_question_pos->question_position;
               
               
            }else{

                $positions  = 0;
        
            }
        }else{

            $positions  = 0;
  
        }

        
      $newpos = $positions +1;
        $this->validate($request,
        [
            'content'=>'bail|required',
            'course'=>'required',
            'video' => 'mimetypes:video/mp4',
            'indice'=>'required|max:255',
        ]);


           
            $question = Question::create([
                 'content' => $request->content,
                'course_id' => $request->course,
                 'video'=>'video',
                 'indice'=>$request->indice,
                 'question_position'=>$newpos,
             ]);

            foreach (request('ref') as $ref) {

                $question -> references() ->attach($ref);
            }
            
        foreach ($request->reponse as $key => $value) {
         
            $status = $request->input('correct') == $key ? 0 : 1;
              $reponse=  Reponse::create([
                    'question_id' => $question->id,
                    'reponse'      => $request->reponse[$key],
                    'correct'     => $request->correct[$key]
                ]);
            
        }

        if($request->hasFile('video'))
        {

            $file_movie = $request->file('video');

            // Get filename with extension
            $filename_movWithExt = $file_movie->getClientOriginalName();

            // Get file path
            $filename_movie = pathinfo($filename_movWithExt, PATHINFO_FILENAME);

            // Remove unwanted characters

            $filename_movie = preg_replace("/[^A-Za-z0-9 ]/", '', $filename_movie);
            $filename_movie = preg_replace("/\s+/", '-', $filename_movie);

            // Get the original image extension
            $extension_mov = $file_movie->getClientOriginalExtension();

            // Create unique file name
            $fileMovieNameToStore = $filename_movie.'_'.time().'.'.$extension_mov;


            $file_movie->move('storage/course/video/',$fileMovieNameToStore);
            $question->video = 'storage/course/video/' .$fileMovieNameToStore;
            
        }

        $question->save();
       
        $request->session()->flash('success', 'votre question as bien été publier');

        return redirect()->to('admin/question');
           

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $question_id = $question->id;
        $ref_question = question::where('id',$question_id)->with('references')->first();
        $ref = $ref_question->references()->get();
        $first = $ref[0];
        $second = $ref[1];
        $reponses = Reponse::where('question_id',$question_id)->get();
        $references = Reference::all();
        if(Auth::user()->role_id == 1)
        {
            
            return view('admin.questions.edit',compact(['question','references','first','second','reponses']));
        }else if(Auth::user()->role_id == 2)
        {
            return view('errors.permissions');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {

         $this->validate($request,
        [
                'content' =>'required' ,
                'video'=>'video',
                'indice'=>'required',
        

        ]);
           
            if($question->isClean('content'))
            {
                
                $question->content  = $question->content;
            }
            if($question->isClean('indice'))
            {
                
                $question->indice  = $question->indice;
            }
            if($question->isClean('question_position'))
            {
                
                $question->question_position  = $request->position;
            }
            $question->content  = $request->content;
            $question->indice  = $request->indice;
             $question->question_position  = $request->position;
            $ref =  $request->ref;
            $question ->references()->sync($ref,['question_id'=>$question->id,'reference_id'=>$ref],true);

            foreach ($request->reponse as $key => $value) {
         
                $status = $request->input('correct') == $key ? 0 : 1;
                DB::table('reponses')->updateOrInsert([
                    'question_id' => $question->id,
                    'reponse'      => $request->reponse[$key],
                    'correct'     => $request->correct[$key]
                ]);
            
            }

        if($request->hasFile('video'))
        {

            $file_movie = $request->file('video');

            // Get filename with extension
            $filename_movWithExt = $file_movie->getClientOriginalName();

            // Get file path
            $filename_movie = pathinfo($filename_movWithExt, PATHINFO_FILENAME);

            // Remove unwanted characters

            $filename_movie = preg_replace("/[^A-Za-z0-9 ]/", '', $filename_movie);
            $filename_movie = preg_replace("/\s+/", '-', $filename_movie);

            // Get the original image extension
            $extension_mov = $file_movie->getClientOriginalExtension();

            // Create unique file name
            $fileMovieNameToStore = $filename_movie.'_'.time().'.'.$extension_mov;


            $file_movie->move('storage/course/video/',$fileMovieNameToStore);
            $question->video = 'storage/course/video/' .$fileMovieNameToStore;
            
        }



            $question->save();

            $request->session()->flash('success', 'votre question as bien été modifier');
            return redirect('admin/question');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::with('references','reponses')->where('id',$id)->first();
         if($question)
         {
            $reponses = Reponse::where('question_id',$id)->get();
            if($reponses){
                foreach ($reponses as $r ) {

                    $r->delete();
                }
            }
            if(file_exists(public_path($question->video)))
            {
                unlink(public_path($question->video));
            }
            $question ->references()->detach();
            $question->delete();
            return view('admin.course.index');
    
        }
    }
    
    
}
