@extends('layouts.admin')

@section('admin.teacher')
<style>
  [x-cloak=""] { display: none; }
</style>
   <div class="elegant-color">
       <div class="jumbotron text-center">
           <h1 class="text-info display-2">Liste des Professeurs</h1>
       </div>
   </div>

   <div class="row">
      <div class="col-12">
      	<div class="card card-list">
          <div class="card-body"></div>
            <div class="card-header bg-dark py-3 my-4 d-flex justify-content-center">
                <a href="{{route('teacher.create')}}" class="btn btn-success btn-md px-3 my-0 mr-0 white-text"><i class="fas fa-plus pr-2"></i>créer un nouveau professeur</a>
            </div>
            <livewire:teacher-table searchable="name,prenom,email"/>
          </div>
        </div>
      </div>
    </div>
@endsection
