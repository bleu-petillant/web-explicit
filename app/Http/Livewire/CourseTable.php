<?php

namespace App\Http\Livewire;


use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CourseTable extends LivewireDatatable
{
    public $model = Course::class;

    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            Column::name('title')
                ->label('Titre')
                ->filterable(),

            Column::name('slug')
                ->label('Slug')
                ->filterable(),
            Column::name('desc')
                ->label('description'),
            Column::name('primary_ressource')
                ->label('première ressource'),
            
            

            Column::callback(['id', 'slug'], function ($id, $slug) {
                if(Auth::user()->role_id == 1){
                    return view('admin.action.courseaction', ['id' => $id, 'slug' => $slug]);
                }else
                {
                    return view('teacher.action.courseaction', ['id' => $id, 'slug' => $slug]);
                }

            }),


        ];
    }
}
