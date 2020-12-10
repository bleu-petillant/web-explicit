@extends('layouts.admin')

@section('teacher.course')

   <div class="elegant-color">
       <div class="jumbotron text-center">
           <h1 class="text-info display-2">Liste des cours vidéo</h1>
       </div>
   </div>
          <div class="card-body">
            <livewire:course-table searchable="category,slug,tag,title"/>
          </div>
@endsection
