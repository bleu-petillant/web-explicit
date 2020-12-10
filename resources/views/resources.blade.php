@extends('layouts.app')
@section('resources')

<h1>page de resource</h1>
<div>
    <livewire:search />
</div>
<section >
    @foreach ($references as $reference)
        <div class="container">
            <h2 class="text-sm">{{$reference->title}}</h2>
        </div>
        <div class="container">
            <img class="object-contain h-96 w-full" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
        </div>
         <p  class="text-lg">
            {{$reference->desc}}
        </p>
            <div class="text-center">
                <p class= text-center text-xl">créer par  mr {{$reference->teacher->name}} </p>
                <p>{{ \Carbon\Carbon::parse($reference->published_at)->diffForHumans() }}</p>
            </div>
    </div>
       @endforeach
</section>
@endsection
