<?php

namespace App\Http\Livewire;


use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class QuestionTable extends LivewireDatatable
{
    public $model = Question::class;

    public function builder()
    {
        return Question::query()
        ->with(['reponses','course','reponsecorrect']);
        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),
            Column::name('course.title')
                ->label('Formation')
                ->filterable(),
            Column::name('question_position')
                ->label('Question N° ')
                ->filterable(),
            Column::name('content')
                ->label('Questions'),
               
            Column::name('reponses.reponse')
                ->label('Reponse possible'),
             
            Column::name('indice')
                ->label('indice'),
            

                Column::callback(['id'], function ($id) {
                if(Auth::user()->role_id == 1){
                    return view('admin.action.questionaction', ['id' => $id]);
                }

            }),
           


        ];
    }


}

