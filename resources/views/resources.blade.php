@extends('layouts.head-home')
@section('resources')

<section class="search-bar">
<h1 class="text-center text-white text-6xl font-bold"> Ressources</h1>
<div class="wrapper">
    <div class="search_box">
        <div class="search_field">    
        <livewire:search />  
        <i class="fas fa-search"></i>
          <!-- <input type="text" class="input" placeholder="Recherche"> -->
        </div>


         <div class="dropdown">
            <div class="default_option">Toute les catégories</div>  
            <ul>
              <li>Toute les catégories</li>
              @if($categories->count() > 0)
              @foreach ($categories as $cat)
              <li id="{{$cat->id}}">{{$cat->name}}</li>
              @endforeach
              @else
              <li >aucune catégorie dans la base de donnée</li>
              @endif
            </ul>
        </div>

    </div>
</div>
</section>



  </div class=" py-2">

  <div class=" shadow md:flex bg-white rounded-xl p-8 md:p-0 mx-8">
 
    <img class="w-32 h-32 md:w-48 md:h-auto  rounded-l-lg " src="img/ressource/explicitation-book.jpg" alt="" width="384" height="512">
    <div class=" podcast-card-content p-6 ">

        <p class="category podcast-color ">Livre</p>
        <h3 class="card-title text-2xl font-bold">Titre de livre, Nom de l'auteur.</h3>
        <p class="text-lg ">
        Vestibulum ultricies, justo nec lacinia auctor, tellus massa efficitur metus, nec <br>
        tempor lectus augue eu nibh. Quisque eget nulla magna. 
        </p>
      
    </div>
    <!-- <a href="" class=" podcast-button uppercase mx-auto tracking-wider">Lien</a> -->
</div>

</section>

<section class="all-ressources contenu">

<h2 class="font-bold text-5xl mt-4 mb-5 mx-8 text-right">Toute nos ressources</h2>

<div class="mx-8">
  <ul class="filters flex justify-around">
		<li><a  href="javascript:void(0);" data-filter="*">Tout</a></li>
		<li><a class="podcast-color" href="javascript:void(0);" data-filter="podcast">Podcast</a></li>
		<li><a class="video-color" href="javascript:void(0);" data-filter="video">video</a></li>
    <li><a class="pdf-color" href="javascript:void(0);" data-filter="pdf">pdf</a></li>
    <li><a class="podcast-color" href="javascript:void(0);" data-filter="articles">autres</a></li>
    </ul>
    @if($references->count() > 0)
	<div id="container" class="isotope grid grid-rows-4 grid-flow-col gap-8">
        @foreach ($references as $ref)
            @if ($ref->category_id == '1')
                <div class=" grid-item pdf-card card bg-white shadow-lg hover:shadow-xl " data-filter="pdf">
                 <a href="">   
                 <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                     <div class="mt-2 py-3 pl-2 pdf-card-content">
                        <p class="category pdf-color ">Pdf</p>
                        <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                        <p class="card-text">{{$ref->desc}}</p>
                    </div>
                    <p class="text-center mt-5 mb-5"><a href="{{asset($ref->pdf)}}" class=" pdf-button uppercase mx-auto tracking-wider">Lien</a></p>
                    </a>    
            </div>
            @elseif($ref->category_id == '2')
            <div class=" grid-item video-card card bg-white shadow-lg hover:shadow-xl " data-filter="video">
                 <a href="">   
                 <img class="card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                     <div class="mt-2 py-3 pl-2 video-card-content">
                        <p class="category video-color ">vidéos</p>
                        <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                        <p class="card-text">{{$ref->desc}}</p>
                    </div>
                    <p class="text-center mt-5 mb-5"><a href="{{asset($ref->link)}}" class=" video-button uppercase mx-auto tracking-wider">Lien</a></p>
                    </a>    
            </div>
            @elseif($ref->category_id == '3')
             <div class="grid-item podcast-card card bg-white shadow-lg hover:shadow-xl " data-filter="podcast">
                 <a href="">   
                 <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                     <div class="mt-2 py-3 pl-2 podcast-card-content">
                        <p class="category podcast-color ">Podcast</p>
                        <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                        <p class="card-text">{{$ref->desc}}</p>
                    </div>
                    <p class="text-center mt-5 mb-5"><a href="{{asset($ref->link)}}" class=" podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
                    </a>    
            </div>
            @elseif($ref->category_id == '4')
            <div class="grid-item podcast-card card bg-white shadow-lg hover:shadow-xl " data-filter="articles">
                 <a href="">   
                 <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                     <div class="mt-2 py-3 pl-2 podcast-card-content">
                        <p class="category podcast-color ">articles</p>
                        <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                        <p class="card-text">{{$ref->desc}}</p>
                    </div>
                    <p class="text-center mt-5 mb-5"><a href="{{asset($ref->link)}}" class=" podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
                    </a>    
            </div>
        @endif
     @endforeach
    </div>
    @else
     <h4>pas de ressources actuellement dans la base de donnée</h4>
    @endif
</div>
</section>
</div>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script>
$(".default_option").click(function(){
  $(".dropdown ul").addClass("active");
});
$(".dropdown ul li").click(function(){
  var text = $(this).text();
  $(".default_option").text(text);
  $(".dropdown ul").removeClass("active");
});
</script>
@endsection
