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

            Column::name('content')
                ->label('Questions')
                ->filterable(),

            Column::name('reponses.reponse')
                ->label('Reponse  ')
                ->filterable(),
             Column::name('course.title')
                ->label('Formation')
                ->filterable(),




        ];
    }


}

