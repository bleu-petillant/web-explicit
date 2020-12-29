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


<section id="formation_grid" class="p-5">
    <div class="flex mx-auto w-2/4 p-2" >
        <div class="w-1/2 mx-auto">
            <p id="courses_choice" class="link-formation text-center selected-choice text-2xl">Vidéo interactive</p>
        </div>
        <div class="w-1/2">
            <p cid="ressource_choice" class="link-formation text-center text-2xl">Ressource</p>
        </div>
        
        
    </div>
    
    <div class="grille mx-auto py-2 " wire:model="references">
        @if ($courses->count() > 0)
            @foreach ($courses as $course)
            <div class="formation-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 grille-item">
                <!-- formation valider -->
                @foreach ($course->coursesvalidate as $validate)
                <div class="w-full">
                    <div class="overlay-validate card-image w-full h-52 absolute"> </div>
                    <img class="course-image card-image w-full h-52 object-cover" src="img/cas-usage/cas-2.jpg" alt="{{$course->alt}}">  
                </div>
                @endforeach
                @foreach ($course->coursesnull as $null)
                <div class="w-full">
                    <div class="overlay-undone card-image w-full h-52 absolute"> </div>
                    <img class="course-image card-image w-full h-52 object-cover" src="img/cas-usage/cas-2.jpg" alt="{{$course->alt}}">  
                </div>
                @endforeach
                <!-- formation pas valider -->
                @foreach ($course->coursesinvalidate as $invalidate)
                <div class="w-full">
                    <div class="overlay-unvalidate card-image w-full h-52 absolute"> </div>
                    <img class="course-image card-image w-full h-52 object-cover" src="img/cas-usage/cas-2.jpg" alt="{{$course->alt}}">  
                </div>
                @endforeach
                
                    
                
                    
                    <div class="mt-2 py-3 pl-2 ">
                        <h3 class="card-title text-2xl font-bold">{{$course->title}}</h3>
                        <p class="card-text">{{$course->desc}}</p>
                        <p class="card-text">{{$course->id}}</p>
                    </div>
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


    @else
    <p>pas de formation pour le moment</p>
    @endif
    </div>
</section>
@endsection