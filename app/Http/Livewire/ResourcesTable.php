<?php

namespace App\Http\Livewire;

use App\Models\Reference;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ResourcesTable extends LivewireDatatable
{
    public $model = Reference::class;

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

                Column::name('link')
                ->label('URL ressources'),

                Column::name('image')
                ->label('Image'),

            Column::callback(['id', 'slug'], function ($id, $slug) {
                if(Auth::user()->role_id == 1){
                    return view('admin.action.resourcesaction', ['id' => $id, 'slug' => $slug]);
                }else
                {
                    return view('teacher.action.resourcesaction', ['id' => $id, 'slug' => $slug]);
                }

            }),

        ];
    }
}
