@extends('layouts.app')
@section('home')

<!-- image avec titre -->
<section class="first-image-home h-screen">
    <h1 class="main-title w-4/5 text-white text-4xl leading-tight sm:mx-10 md:mx-10 lg:mx-10 font-bold pl-4 object-left-bottom absolute bottom-20 left-3 sm:text-6xl">
        Découvrir et apprendre les méthodes d'explicitation
    </h1>
    <div class="bottom-arrow"></div>
</section>

<!-- texte de présentation -->
<section class="presentation-home flex my-10">
    <div class="presentation-home-text md:ml-8  md:flex lg:flex my-10">
            <h2 class="presentation-home-title uppercase absolute font-bold text-4xl ml-2 " >Présentation</h2>
                <p class="text-xl text-justify mt-10 mr-2 px-2 flex-initial  ">
                Pellentesque nisl dolor, varius et est non, aliquam aliquet ligula. Fusce a auctor sapien. Aenean fermentum,urna in volutpatull amcorper, ante dolorrhoncus dui, et tristique nunc risus et ex. In hachab itasse platead ictumst. Donec volutpat ullamcorper, ante dolor rhoncus dui, 
                </p>
                <p class="text-xl text-justify mt-10 px-2 flex-initial home-present-tex2 mr-2">
                Pellentesque nisl dolor, varius et est non, aliquam aliquet ligula. Fusce a auctor sapien. Aenean fermentum,urna in volutpatull amcorper, ante dolorrhoncus dui, et tristique nunc risus et ex. In hachab itasse platead ictumst. Donec volutpat ullamcorper, ante dolor rhoncus dui, 
                </p>             
    </div>
<img class="flex-initial present-image" src="img/present-image-laptop.png" alt=""> 

</section>

<img class="flex-initial present-image-md" src="img/present-image-medium-screen.png" alt=""> 
<!-- ressource -->
<section class=""> 
    <div class="flex my-10"> 
        <div>
            <img class="ressource-book" src="img/ressource-book-image.png" alt="">
        </div>
        <div class="presentation-home-text ressources-text ">
            <h2 class="ressource-home-title uppercase absolute font-bold text-4xl ml-4" >Ressources</h2>
            <p class=" text-xl text-justify mt-10 px-4 w-3/4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus recusandae ipsam aliquam commodi officia voluptates quis reiciendis fugit eligendi tempora?</p>
        </div>
    </div>
   
    
  <!-- cartes des ressources -->
    <div class="my-20 w-3/4 mx-auto">
        <div class="flex mx-auto justify-center ressource-cards py-2">
            @if($references->count() > 0)
            @foreach ($references as $reference)
             <div class="card bg-white shadow-lg w-1/5 hover:shadow-xl mx-8 ">
                @if ($reference->category_id == '1')
             <a href="{{ $reference->pdf }}" target="_blank" >
                @else
                <a href="{{ $reference->link }}" target="_blank" >
                @endif
                <img class=" card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                        <div class="py-3 pl-2">
                            @if ($reference->category_id == '1')
                                <p class="category pdf-color ">pdf</p>
                            @elseif($reference->category_id == '2')
                                 <p class="category video-color ">vidéo</p>
                                 @elseif($reference->category_id == '3')
                                    <p class="category podcast-color ">podcast</p>
                                    @else
                                    <p class="category podcast-color ">articles</p>
                                 @endif
                            <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                            <p class="card-text">{{$reference->desc}}</p>
                        </div>
                </a>
            </div>
            @endforeach 
            @else
             <h4 class=" text-xl text-justify mt-10 px-4 w-3/4">désoler nous n' avons pas de ressources pour le moment</h4>
            @endif
        </div>
        <div class="flex mx-auto justify-center">
            <div class="w-1/5 mx-8" ></div>
            <div class="w-1/5 mx-8"></div>
            <div class="w-1/5 mx-8"></div>
            <div class="w-1/5 mx-8 mb-5 ">
            <a href="{{route('ressources.all')}}" class=" bg-white text-lg ressource-home-button uppercase relative float-right  "> les ressources</a>
            </div>
        </div>
    </div>
</section>

<!-- formation interactive -->

<section class="">
    <img class="flex-initial formation-image-md" src="img/formation_home_mobile.png" alt="">
    <div class="flex my-5"> 
            <div>
                <img class="formation-home-img" src="img/formation_home.png" alt="">
            </div>
            <div class="formation-home-text pt-10 pr-20 pb-10 pl-20">
                <div class="border-l-4 border-white">
                    <h2 class="leading-tight text-white ressource-home-title uppercase font-bold text-4xl ml-4" >formation <br> interactive</h2>
                    <p class=" text-white text-xl text-justify px-4 pt-3 w-3/4 font-light mb-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>                   
                </div>
            <p class="text-center"><a class="justify-center text-lg bg-white uppercase my-1 py-2 px-10 rounded" href="{{route('formations.all')}}">Commencer</a></p>
            </div>
        
    </div>
    
</section>

<!-- Cas d'usage -->
<section class="md:w4/4 lg:w-3/4 mx-auto">
    <h2 class="text-4xl font-bold mx-8 my-8">Cas d'usage </h2>
     <div class="flex laptop-tablette-cas-usage">
    @if ($usages->count() > 0)
    @foreach ($usages as $usage)
    <div class="card cas-usage cas-usage3 bg-white shadow-lg hover:shadow-xl mx-10">
         <a href="{{route('usage')}}">
                <img class="card-image w-full h-50 object-cover cas-usage-miniature" src="{{asset($usage->image)}}" alt="{{$usage->alt}}">
                <div class="play-usage-button button-usage-1"><i class="fas fa-play"></i></div>
                <div class="py-3 pl-2">
                    <h3 class="card-title text-2xl font-bold">{{$usage->title}}</h3>
                    <p class="card-text">{{$usage->desc}}</p>
                </div>
            </a>
    </div>
    @endforeach
    @else
     <h1>pas de cas d 'usage pour le moment</h1>
    @endif
   
    </div>

    <div class="mobile-cas-usage flex my-2">

        <div class="card cas-usage cas-usage3 bg-white shadow-lg hover:shadow-xl mx-10">
            <img class=" card-image w-full h-50 object-cover  cas-usage-miniature" src="img/cas-usage/cas-1.jpg" alt="">
            <div class="play-usage-button button-usage-1"><i class="fas fa-play"></i></div>
                <div class="py-3 pl-2">
                    <h3 class="card-title text-2xl font-bold">Recherche et formation <br> en STAPS</h3>
                    <p class="card-text">Détails sur la ressource</p>
                </div>
        </div>

        <div class="card cas-usage cas-usage3 bg-white shadow-lg hover:shadow-xl mx-10">
            <img class=" card-image w-full h-50 object-cover cas-usage-miniature" src="img/cas-usage/cas-3.jpg" alt="">
            <div class="play-usage-button button-usage-2"><i class="fas fa-play"></i></div>
                <div class="py-3 pl-2">
                    <h3 class="card-title text-2xl font-bold">Recherche et formation <br> à la méditation</h3>
                    <p class="card-text">Détails sur la ressource</p>
                </div>
        </div>

        <div class="card cas-usage cas-usage3 bg-white shadow-lg hover:shadow-xl mx-10">
            <img class=" card-image w-full h-50 object-cover cas-usage-miniature" src="img/cas-usage/cas-2.jpg" alt="">
            <div class="py-3 pl-2">
                <h3 class="card-title text-2xl font-bold">Formation des pompiers <br> <br> </h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>
        </div>

    </div>

<a class="bg-white text-lg ressource-home-button uppercase relative float-right  mx-8 mt-2 mb-8 md:mx-auto" href="{{route('usage')}}"> les cas d'usage</a>

</section>

@endsection




