@extends('layouts.admin')

@section('teacher.teacher')

   <div class="elegant-color">
       <div class="jumbotron text-center">
           <h1 class="text-info display-2">Liste des Professeurs</h1>
       </div>
   </div>

      <div class="row">
      <div class="col-12">
      	<div class="card card-list">
          <div class="card-body"></div>
            <livewire:teacher-table searchable="name,prenom,email"/>
          </div>
        </div>
      </div>
    </div>
@endsection
