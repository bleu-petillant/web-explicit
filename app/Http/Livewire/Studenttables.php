<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;

class Studenttables extends LivewireDatatable
{

    public $model = User::class;

    public function builder()
    {
        return User::query()
        ->where('role_id','=','3');
    }

    public function columns()
    {

        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            Column::name('prenom')
                ->label('Prenom')
                ->filterable(),

            Column::name('name')
                ->label('Nom')
                ->defaultSort('asc')
                ->filterable(),

            Column::name('email')
                ->label('Email')
                ->defaultSort('asc')
                ->filterable(),

         

            Column::callback(['id', 'name'], function ($id, $name) {
                if(Auth::user()->role_id == 1)
                {
                    return view('admin.action.studentaction', ['id' => $id, 'name' => $name]);
                }

            }),

        ];
    }


}
