@extends('layouts.app')
@section('usage')


     @foreach ($usages as $usage)
        <div class="pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8  my-8">
        <img class="pdf-card card-image w-full h-40 object-cover" src="{{asset($usage->image)}}" alt="{{$usage->alt}}">
                <div class="mt-2 py-3 pl-2 pdf-card-content">
                   <iframe src="{{$usage->link}}" frameborder="0"></iframe>
                    <h3 class="card-title text-2xl font-bold">{{$usage->title}}</h3>
                    <p class="card-text">{{$usage->desc}}</p>
                    <p class="text-center mt-5 mb-5"><a href="{{$usage->link}}" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>
                    <span class=" text-blue-400">articles créer par {{$usage->teacher->name}} </span>
                </div> 
        </div>
    @endforeach

@endsection