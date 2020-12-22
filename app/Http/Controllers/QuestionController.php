<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;

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
        

        $reponses = Reponse::all();

        return view('admin.questions.create', compact(['reponses','courses']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'content'=>'required',
            'course'=>'required',
        ]);
        
        $question = Question::create([
            'content' => $request->content,
            'course_id' => $request->course,

        ]);

     
            
        foreach ($request->reponse as $key => $value) {
         
            $status = $request->input('correct') == $key ? 0 : 1;
              $reponse=  Reponse::create([
                    'question_id' => $question->id,
                    'reponse'      => $request->reponse[$key],
                    'correct'     => $request->correct[$key]
                ]);
            
        }



        $question->save();
       



        $request->session()->flash('success', 'votre question as bien été publier');

        return redirect()->back();
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
