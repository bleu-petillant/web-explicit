@extends('layouts.admin')

@section('admin.tag')
   <div class="elegant-color">
       <div class="jumbotron text-center">
           <h1 class="font-perso text-info display-2">Liste des Tags</h1>
       </div>
   </div>
   <div class="row">
      <div class="col-12">
      	<div class="card card-list">
          <div class="card-header bg-dark d-flex justify-content-center align-items-center py-3 my-4">
                <a href="{{route('tag.create')}}" class="btn btn-success btn-md px-3 my-0 mr-0 white-text"><i class="fas fa-plus pr-2"></i> ajouter un tag</a>
          </div>
            <div class="card-body">
                <livewire:tags-table searchable="slug,tag,name"/>
            </div>
        </div>
      </div>
    </div>
@endsection
