@extends('layouts.app')
@section('course')
<div>
    <livewire:search />
</div>
<section >
        <div class="container">
            <h2 class="text-sm">{{$course->title}}</h2>
        </div>
        <div class="container">
            <img class="object-contain h-96 w-full" src="{{asset($course->image)}}" alt="{{$course->alt}}">
         <video controls width="800">
                <source src="{{asset($course->video)}}" type="video/mp4">
         </video>
        </div>
         <p  class="text-lg">
            {{$course->desc}}
        </p>
            <div class="text-center">
                <p class= "text-center text-xl">créer par  mr {{$course->teacher->name}} </p>
                <p>{{ \Carbon\Carbon::parse($course->published_at)->diffForHumans() }}</p>
            </div>
    </div>
</section>
@endsection
