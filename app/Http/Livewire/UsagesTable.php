<?php

namespace App\Http\Livewire;


use App\Models\Usage;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UsagesTable extends LivewireDatatable
{
    public $model = Usage::class;

    public function builder()
    {
        return Usage::query();
        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable()
                 ,

            Column::name('title')
                ->label('Titre')
                ->filterable(),

                Column::name('desc')
                ->label('Description'),

                Column::name('link')
                ->label('Lien vers la vidéo'),



            Column::callback(['id', 'slug'], function ($id, $slug) {
                if(Auth::user()->role_id == 1){
                    return view('admin.action.usagesaction', ['id' => $id, 'slug' => $slug]);
                }

            }),
            Column::callback(['image'], function ($image) {
                if(Auth::user()->role_id == 1){
                    return view('admin.action.columunimage', ['image'=>$image]);
                }

            }),

        ];
    }
}
