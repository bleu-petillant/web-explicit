@extends('layouts.app')
@section('allressourcesprivate')

<section id="formation_title" class="p-5">
    <div class="flex w-3/4 mx-auto">
        <div class="w-3/4">
            <h1 class="text-white text-6xl font-bold uppercase leading-none">Formation<br>interactive</h1>
        </div>
        <div class="w-1/4">
            <p class="text-white">Pellentesque nisl dolor, varius et est non,<br> aliquam aliquet ligula. Fusce a auctor <br> sapien.
            Ante dolor rhoncus dui, et tristique nunc <br> risus et ex.</p>
        </div>        
    </div> 
</section>
    <div class="flex mx-auto my-3 w-2/4 p-2" >
        <div class="w-1/2 mx-auto">
            <a href="{{route('formations.all')}}" id="courses_choice" class="link-formation text-center  text-2xl">Vidéo interactive</a>
        </div>
        <div class="w-1/2">
            <a href="{{ route('ressources.private') }}" id="ressource_choice" class="link-formation selected-choice text-center text-2xl">Ressource</a>
        </div>
    </div>
<section id="formation_grid" class="p-5">

    <div class="grille mx-auto py-2 " wire:model="references">
        @if ($references->count() > 0)
            @foreach ($references as $ref)
            <div class="formation-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 grille-item">
                <a href="{{$ref->link}}" >
                    <div class="mt-2 py-3 pl-2 ">
                        <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                        <p class="card-text">{{$ref->desc}}</p>
                    </div>
                </a>
        <!-- -- fin du foreach pour les ressources -- -->
    </div>
        @endforeach
    @else
    <p>pas de formation pour le moment</p>
    @endif
    </div>
</section>
@endsection