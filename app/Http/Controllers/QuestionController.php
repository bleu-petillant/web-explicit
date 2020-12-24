<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Reponse;
use App\Models\Question;
use App\Models\Reference;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class QuestionController extends Controller
{

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
        $courses = Course::all();
        $references = Reference::all();
        $reponses = Reponse::all();
    

        return view('admin.questions.create', compact(['reponses','courses','references']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pos = $request->input('position');
        $course = $request->input('course_id');
        $this->validate($request,
        [
            'content'=>'required',
            'course'=>'required',
            'video' => 'mimetypes:video/avi,video/mp4,video/webm,video/mkv,video/wmv,video/movie',
            'question_position'=>'integer|'
        ]);
        $count = question::where('question_position' ,$pos)->
            count();
         
            if($count  > 0)
            {
                $request->session()->flash('error', 'cette question existe dèjà à cette position, essayer de changer la position');
                return redirect()->back();
            }else
            {
      
                $question = Question::create([
                 'content' => $request->content,
                'course_id' => $request->course,
                 'video'=>'video',
                 'question_position'=>$request->position,
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
