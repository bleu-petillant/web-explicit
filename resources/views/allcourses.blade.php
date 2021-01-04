@extends('layouts.app')
@section('allcourse')


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
            <p id="courses_choice" class="link-formation text-center selected-choice text-2xl">Vidéo interactive</p>
        </div>
        <div class="w-1/2">
            <p cid="ressource_choice" class="link-formation text-center text-2xl">Ressource</p>
        </div>
    </div>
<section id="formation_grid" class="p-5">

    <div class="grille mx-auto py-2 " wire:model="references">
        @if ($courses->count() > 0)
            @foreach ($courses as $course)
            <div class="formation-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 grille-item">
                <a href="{{route('formation',[$course->slug])}}" >

                @foreach ($course->users as $user)
                    @if ($user->pivot->validate == 1)
                    <div class="w-full">
                        <div class="overlay-validate card-image w-full h-52 absolute"> </div>
                        <img class="course-image card-image w-full h-52 object-cover" src="{{ asset($course->image)}}" alt="{{$course->alt}}">  
                    </div>
                    @elseif($user->pivot->validate == 0 &&  $user->pivot->activated == 1)
                    <div class="w-full">
                        <div class="overlay-activate card-image w-full h-52 absolute"> </div>
                        <img class="course-image card-image w-full h-52 object-cover" src="{{ asset($course->image)}}" alt="{{$course->alt}}">  
                    </div>
                    @else
                    <div class="w-full">
                        <div class="overlay-undone card-image w-full h-52 absolute"> </div>
                        <img class="course-image card-image w-full h-52 object-cover" src="{{ asset($course->image)}}" alt="{{$course->alt}}">  
                    </div>
                    @endif

                @endforeach
                    <div class="mt-2 py-3 pl-2 ">
                        <h3 class="card-title text-2xl font-bold">{{$course->title}}</h3>
                        <p class="card-text">{{$course->desc}}</p>
                    </div>
                </a>


                <div class="flex p-4">
                <!-- foreach pour les ressources de chaque cours avec les catégories  -->
                @foreach ($course->references as $ref) 
                    @if ($ref->category_id == 1)
                    <a class="mr-2" href="{{$ref->link}}">
                    <div class="pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto ">
                        <p class="category category-course-ref pdf-color ">pdf</p>
                        <p class= "text-reference-formation text-center text-base font-semibold">{{$ref->title}} </p> <br>
                    </div>
                    </a>
                    @elseif($ref->category_id == 2)
                    <a class="mr-2" href="{{$ref->link}}">
                    <div class="video-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto ">
                        <p class="category category-course-ref video-color ">vidéo</p>
                            <p class= "text-reference-formation text-center text-base font-semibold">{{$ref->title}} </p> <br>
                    </div>
                    </a>
                    @elseif($ref->category_id == 3)
                    <a class="mr-2" href="{{$ref->link}}">
                        <div class="podcast-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto ">
                            <p class="category category-course-ref podcast-color ">podcast</p>
                        <p class= "text-reference-formation text-center text-base font-semibold">{{$ref->title}} </p> <br>
                    </div>
                    </a>
                    @elseif($ref->category_id == 4)
                    <a class="mr-2" href="{{$ref->link}}">
                    <div class="pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto ">
                        <p class="category category-course-ref pdf-color ">articles</p>
                        <p class= "text-reference-formation text-center text-base font-semibold">{{$ref->title}} </p> <br>
                    </div>
                    </a>
                    @endif
                @endforeach
            </div>
        <!-- -- fin du foreach pour les ressources -- -->
        
    </div>
    @endforeach
    @endif

    @if ($courses_null->count() > 0)
       @foreach ($courses_null as $null)
                    <div class="formation-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 grille-item">
                <a href="{{route('formation',[$null->slug])}}" >
                    <div class="w-full">
                        <div class="overlay-undone card-image w-full h-52 absolute"> </div>
                        <img class="course-image card-image w-full h-52 object-cover" src="{{ asset($null->image)}}" alt="{{$null->alt}}">  
                    </div>
                    <div class="mt-2 py-3 pl-2 ">
                        <h3 class="card-title text-2xl font-bold">{{$null->title}}</h3>
                        <p class="card-text">{{$null->desc}}</p>
                        <p class="card-text">{{$null->id}}</p>
                    </div>

                </a>

                <p class= "text-center text-xl">créer par  mr {{$null->teacher->name}} </p> <br>
                <p>{{ \Carbon\Carbon::parse($null->published_at)->diffForHumans() }}</p> <br>
                <p class="text-center mt-5 mb-5"><a href="{{route('formation',[$null->slug])}}" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>

                <div class="flex p-4">
                <!-- foreach pour les ressources de chaque cours avec les catégories  -->
                @foreach ($null->references as $ref) 
                    @if ($ref->category_id == 1)
                    <a class="mr-2" href="{{$ref->link}}">
                    <div class="pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto ">
                        <p class="category category-course-ref pdf-color ">pdf</p>
                        <p class= "text-reference-formation text-center text-base font-semibold">{{$ref->title}} </p> <br>
                    </div>
                    </a>
                    @elseif($ref->category_id == 2)
                    <a class="mr-2" href="{{$ref->link}}">
                    <div class="video-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto ">
                        <p class="category category-course-ref video-color ">vidéo</p>
                            <p class= "text-reference-formation text-center text-base font-semibold">{{$ref->title}} </p> <br>
                    </div>
                    </a>
                    @elseif($ref->category_id == 3)
                    <a class="mr-2" href="{{$ref->link}}">
                        <div class="podcast-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto ">
                            <p class="category category-course-ref podcast-color ">podcast</p>
                        <p class= "text-reference-formation text-center text-base font-semibold">{{$ref->title}} </p> <br>
                    </div>
                    </a>
                    @elseif($ref->category_id == 4)
                    <a class="mr-2" href="{{$ref->link}}">
                    <div class="pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto ">
                        <p class="category category-course-ref pdf-color ">articles</p>
                        <p class= "text-reference-formation text-center text-base font-semibold">{{$ref->title}} </p> <br>
                    </div>
                    </a>
                    @endif
                @endforeach
            </div>
        <!-- -- fin du foreach pour les ressources -- -->
        
    </div>
       @endforeach
           @else
    <p>pas de formation pour le moment</p>
    @endif
    </div>
</section>

<section id="ressources_grid" class="p-5">

</section>
@endsection