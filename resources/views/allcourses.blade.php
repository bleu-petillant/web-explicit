@extends('layouts.app')
@section('allcourse')

<section >
    <div id="all-resource">
        <section class="ressources-news contenu">
         <h2 class="font-bold text-5xl mt-4 mb-5 mx-8">Nouveautés</h2>
    <div class="flex mx-auto py-2 news-ressource-cards" wire:model="references">
    @if ($courses->count() > 0)
    @foreach ($courses as $course)
        <div class="pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
        <!-- formation valider -->
        @foreach ($course->coursesvalidate as $validate)
            <img class="pdf-card card-image w-full h-40 object-cover" src="{{asset($course->image)}}" alt="{{$course->alt}}"> 
        @endforeach
        <!-- formation pas valider -->
        @foreach ($course->coursesinvalidate as $invalidate)
            <img class="pdf-card card-image w-full h-40 object-cover" src="{{asset($course->image)}}" alt="{{$course->alt}}">
        @endforeach
        
        
                <div class="mt-2 py-3 pl-2 pdf-card-content">
                    <h3 class="card-title text-2xl font-bold">{{$course->title}}</h3>
                    <p class="card-text">{{$course->desc}}</p>
                </div>
                <p class= "text-center text-xl">créer par  mr {{$course->teacher->name}} </p> <br>
                <p>{{ \Carbon\Carbon::parse($course->published_at)->diffForHumans() }}</p> <br>
                <p class="text-center mt-5 mb-5"><a href="{{route('formation.show',[$course->slug])}}" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>
        <div class="flex">
        {{-- foreach pour les ressources de chaque cours avec les catégories --}}
        @foreach ($course->references as $ref) 
        @if ($ref->category_id == 1)
        <a href="{{$ref->link}}">
         <div class="pdf-card-content card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
             <p class="category pdf-color ">pdf</p>
            <p class= "text-center text-xl">{{$ref->title}} </p> <br>
         </div>
         </a>
        @elseif($ref->category_id == 2)
        <a href="{{$ref->link}}">
        <div class="video-card-content card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
             <p class="category video-color ">vidéo</p>
                <p class= "text-center text-xl">{{$ref->title}} </p> <br>
         </div>
        </a>
        @elseif($ref->category_id == 3)
        <a href="{{$ref->link}}">
            <div class="podcast-card-content card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
                 <p class="category podcast-color ">podcast</p>
            <p class= "text-center text-xl">{{$ref->title}} </p> <br>
         </div>
        </a>
        @elseif($ref->category_id == 4)
        <a href="{{$ref->link}}">
        <div class="pdf-card-content card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
             <p class="category pdf-color ">articles</p>
            <p class= "text-center text-xl">{{$ref->title}} </p> <br>
         </div>
        </a>
        @endif
        @endforeach
         </div>
        {{-- fin du foreach pour les ressources --}}
         
    </div>
    @endforeach
    @else
    <p>pas de formation pour le moment</p>
    @endif
    </div>
        </section>
    </div>
</section>
@endsection