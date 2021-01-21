@extends('layouts.app')
@section('allressourcesprivate')

<section id="formation_title" class="md:p-5">
    <div class="grid grid-title-2 w-3/4 mx-auto">
        <div class="">
            <h1 class="h1-main-tittle text-white sm:text-3xl md:text-6xl font-bold uppercase leading-none">Formations<br>interactives</h1>
        </div>
        <div class="">
            <p class="text-white">Pellentesque nisl dolor, varius et est non,<br> aliquam aliquet ligula. Fusce a auctor <br> sapien.
            Ante dolor rhoncus dui, et tristique nunc <br> risus et ex.</p>
        </div>        
    </div> 
</section>
<div class="flex mx-auto my-3 sm:w-full md:w-2/4 p-2" >
        <div class="w-1/2 mx-auto">
            <a href="{{route('formations.all')}}"><p id="courses_choice" class="link-formation text-center text-2xl" >Vidéos interactives</p></a>
        </div>
        <div class="w-1/2">
            <a href="{{ route('ressources.private') }}" id="ressource_choice"><p class="link-formation selected-choice   text-center text-2xl">Ressources</p> </a>
        </div>
    </div>
<section id="formation_grid" class="p-5">

    <div class="grille mx-auto py-2 " wire:model="references">

        @foreach ($references as $ref)
            @if ($ref->category_id == '1')
            <div class="formation-card card-ressource pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 grille-item">
                <a href="{{$ref->pdf}}" target="__blank" >
                <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                <div class>
                    <div class="mt-2 py-3 pl-2 all-pdf-card-content">
                        <p class="category pdf-color ">Pdf</p>
                        <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                        <p class="card-text">{{$ref->desc}}</p>
                    </div>
                </a>
                <p class="text-center mt-5 mb-5"><a href="{{$ref->pdf}}" class=" private-pdf-button uppercase mx-auto tracking-wider"  target="_blank">Lien</a></p>
                </div>
            </div>
            @elseif ($ref->category_id == '2')
            <div class="formation-card card-ressource video-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 grille-item">
                <a href="{{$ref->link}}"target="_blank" >
                <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                    <div class="mt-2 py-3 pl-2 all-video-card-content">
                        <p class="category video-color ">Vidéo</p>
                        <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                        <p class="card-text">{{$ref->desc}}</p>
                    </div>
                </a>
                <p class="text-center mt-5 mb-5"><a href="{{$ref->link}}" class=" private-video-button uppercase mx-auto tracking-wider"  target="_blank">Lien</a></p>
            </div>
            @elseif ($ref->category_id == '3')
            <div class="formation-card card-ressource podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 grille-item">
                <a href="{{$ref->link}}"target="_blank" >
                <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                    <div class="mt-2 py-3 pl-2 all-podcast-card-content">
                        <p class="category podcast-color ">Podcast</p>
                        <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                        <p class="card-text">{{$ref->desc}}</p>
                    </div>
                </a>
                <p class="text-center mt-5 mb-5"><a href="{{$ref->link}}" class=" private-podcast-button uppercase mx-auto tracking-wider"  target="_blank">Lien</a></p>
            </div>
            @elseif ($ref->category_id == '4')
            <div class="formation-card card-ressource podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 grille-item">
                <a href="{{$ref->link}}"target="_blank" >
                <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                    <div class="mt-2 py-3 pl-2 all-podcast-card-content">
                        <p class="category podcast-color ">Article</p>
                        <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                        <p class="card-text">{{$ref->desc}}</p>
                    </div>
                </a>
                <p class="text-center mt-5 mb-5"><a href="{{$ref->link}}" class=" private-podcast-button uppercase mx-auto tracking-wider"  target="_blank">Lien</a></p>
            </div>

            @else
            <p>Pas de formation pour le moment</p>
            @endif
        @endforeach

        
    
    </div>
</section>
@endsection