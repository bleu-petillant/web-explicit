<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CategoryTable extends LivewireDatatable
{
    public $model = Category::class;

    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            Column::name('name')
                ->label('Nom de la  catégorie')
                ->filterable(),


            Column::callback(['id', 'name'], function ($id, $name) {
                if(Auth::user()->role_id == 1){
                    return view('admin.action.categoriesaction', ['id' => $id, 'name' => $name]);
                }

            })


        ];
    }
}
