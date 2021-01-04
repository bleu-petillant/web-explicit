@extends('layouts.admin')

@section('teacher.resource')
<style>
  [x-cloak=""] { display: none; }
</style>
   <div class="elegant-color">
       <div class="jumbotron text-center">
           <h1 class="text-info display-2">Liste des Ressources</h1>
       </div>
   </div>

   <div class="row">
      <div class="col-12">
      	<div class="card card-list">
          <div class="card-header bg-dark d-flex justify-content-between align-items-center py-3">
            <p class="h5-responsive font-weight-bold mb-0">Liste des ressources</p>
          </div>
        <div class="card-body">
            <livewire:resources-table searchable="category,slug,tag,title"/>
        </div>
        </div>
      </div>
    </div>
@endsection
