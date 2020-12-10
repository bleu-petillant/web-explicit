@extends('layouts.admin')

@section('admin.student')
   <div class="elegant-color">
       <div class="jumbotron text-center">
           <h1 class="text-info display-2">Liste des étudients</h1>
       </div>
   </div>
   <div class="row">
      <div class="col-12">
      	<div class="card card-list">
        <div class="card-header bg-dark py-3 d-flex justify-content-center my-4">
            <a href="{{route('student.create')}}" class="btn btn-success btn-md px-3 my-0 mr-0 white-text"><i class="fas fa-plus pr-2"></i>inscrire un nouvel étudient</a>
        </div>
          <div class="card-body">

            <livewire:studenttables searchable="name,prenom,email"/>
          </div>
        </div>
      </div>
    </div>
@endsection
