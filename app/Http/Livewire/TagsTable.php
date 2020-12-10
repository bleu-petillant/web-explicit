<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TagsTable extends LivewireDatatable
{
    public $model = Tag::class;

    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            Column::name('name')
                ->label('Nom du tag')
                ->filterable(),

            Column::name('slug')
                ->label('Slug')
                ->filterable(),

            Column::callback(['id', 'name'], function ($id, $name) {
                if(Auth::user()->role_id == 1){
                    return view('admin.action.tagsaction', ['id' => $id, 'name' => $name]);
                }else
                {
                    return;
                }

            }),


        ];
    }
}
