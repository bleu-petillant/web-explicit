@extends('layouts.admin')

@section('admin.resources')
<style>
  [x-cloak=""] { display: none; }
</style>
   <div class="elegant-color">
       <div class="jumbotron text-center">
           <h1 class="text-info display-2">Liste des ressources</h1>
       </div>
   </div>

   <div class="row">
      <div class="col-12">
      	<div class="card card-list">
        <div class="card-header bg-dark py-3 d-flex justify-content-center my-4">
          <a href="{{route('reference.create')}}" class="btn btn-success btn-md px-3 my-0 mr-0 white-text"><i class="fas fa-plus pr-2"></i>créer une nouvelle ressources</a>
          </div>
          <div class="card-body">
            <livewire:resources-table 
            {{-- include="id ,tagged.tag_name|Tags, title,desc,category.name|Catégories,slug"  --}}
            searchable="title,slug"/>
          </div>
        </div>
      </div>
    </div>
@endsection
