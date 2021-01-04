<?php

namespace App\Http\Livewire;

use App\Models\Reference;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ResourcesTable extends LivewireDatatable
{
    public $model = Reference::class;

    public function builder()
    {
        return Reference::query()
        ->with('tagged')
        ->with('category');
        
    }
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

                Column::name('link')
                ->label('Lien de la  ressource'),
                
                Column::name('desc')
                ->label('Description'),

                Column::name('category.name')
                ->label('Categories'),

                Column::name('tagged.tag_name')
                ->label('Tags associés'),

                Column::name('private',1)
                ->label(' privé 1 = oui'),


            Column::callback(['image'], function ($image) {

                return view('admin.action.columunimage', ['image'=>$image]);
               
            }),

            Column::callback(['id', 'slug'], function ($id, $slug) {
                if(Auth::user()->role_id == 1){
                    return view('admin.action.resourcesaction', ['id' => $id, 'slug' => $slug]);
                }

            }),
           

        ];
    }
}
