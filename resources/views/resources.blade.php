@extends('layouts.app')
@section('resources')

<div id="loading" class="h-screen w-screen absolute z-40 bg-white top-0 ">
    <div class="relative">
        <div class="absolute z-40 top-O bot-0 left-0 right-0">
            <img class="block lg:hidden w-1/12 w-auto" src="{{ asset('img/logo/logonoir.png') }}" alt="Workflow">
        </div>
    </div>
    
</div>

    <section class="search-bar">
        <h1 class="text-center text-white text-6xl font-bold"> Ressources</h1>
        <div class="wrapper">
            <div class="search_box">
                <div class="flex" > 
                        <div class="search_field">    
                                <i class="fas fa-search"></i>
                                <input id="searchBar" type="text"
                                class="input focus:outline-none placeholder-cool-gray-500 " placeholder="Recherche"
                                />
                        </div>

                    <select name="category_id" id="category_id" class="dropdown" >
                        <div  class="default_option">
                            <option value="" selected>Toutes les catégories</option>
                            @foreach ($categories as $cat)
                            <option  value="{{$cat->id}}" >{{$cat->name}} </option > 
                            @endforeach
                        </div>
                    </select>

                </div>           
            </div>
        </div> 
    </section>
    <section class="ressource-news contenu">
        <h2 id="result" class="font-bold text-5xl mt-4 mb-5 mx-8">Nouveautés</h2>
        <span id="noresult"></span>
            <div class="flex mx-auto py-2 news-ressource-cards">
                @if (count($references)  >  0)
                    @foreach ($references as $reference)
                    
                    @if ($reference->category_id == '1')
                        <div class="pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
                            <a href="" >
                                <img class="pdf-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-pdf-card-content">
                                    <p class="category pdf-color ">pdf</p>
                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p>
                                </div>
                                <p class="text-center mt-5 mb-5"><a href="{{$reference->pdf}}" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>
                            </a>
                        </div>
                    @elseif($reference->category_id == '2')
                        <div class="video-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
                            <a href="" >
                                <img class="video-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-video-card-content">
                                    <p class="category video-color ">video</p>
                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p>
                                </div>
                                <p class="text-center mt-5 mb-5"><a href="{{$reference->link}}" class="video-button uppercase mx-auto tracking-wider">Lien</a></p>
                            </a>
                        </div>
                    @elseif($reference->category_id == '3')
                        <div class="podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
                            <a href="" >
                                <img class="podcast-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-podcast-card-content">
                                    <p class="category podcast-color ">podcast</p>

                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p>
                                </div>
                                <p class="text-center mt-5 mb-5"><a href="{{$reference->link}}" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
                            </a>
                        </div>
                    @elseif($reference->category_id == '4')
                        <div class="podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
                            <a href="" >
                                <img class="podcast-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-podcast-card-content">
                                    <p class="category podcast-color ">articles</p>

                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p>
                                </div>
                                <p class="text-center mt-5 mb-5"><a href="{{$reference->link}}" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
                            </a>
                        </div>
                    @endif
                    
                    @endforeach
                    @else
                @endif
            </div> 

            <div class=" py-2">

            <div class=" shadow md:flex bg-white rounded-xl p-8 md:p-0 mx-8">
                    <img class="w-32 h-32 md:w-48 md:h-auto  rounded-l-lg " src="img/ressource/explicitation-book.jpg" alt="" width="384" height="512">

                    <div class=" all-podcast-card-content p-6 ">
                        <p class="category podcast-color ">Livre</p>
                        <h3 class="card-title text-2xl font-bold">Titre de livre, Nom de l'auteur.</h3>
                        <p class=" mb-3 text-lg ">
                        Vestibulum ultricies, justo nec lacinia auctor, tellus massa efficitur metus, nec <br>
                        tempor lectus augue eu nibh. Quisque eget nulla magna. 
                        </p>
                        <a href="" class=" flex-none podcast-button uppercase mx-auto tracking-wider">Lien</a>
                    </div>

            </div>
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
    
	<div id="container" class="isotope">
        @foreach ($references as $ref)
            @if ($ref->category_id == '1')
                <div class=" grid-item pdf-card card bg-white shadow-lg hover:shadow-xl " data-filter="pdf">
                    <a href="{{asset($ref->pdf)}}" class="card-link">   
                        <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                        <div class="card-content">
                            <div class="mt-2 py-3 pl-2 pdf-card-content ">
                                <p class="category pdf-color ">Pdf</p>
                                <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                                <p class="card-text">{{$ref->desc}}</p>
                            </div>
                        </div>
                    </a>
                    <div class="card-button">
                        <p class="text-center mt-5 mb-5 pdf-button uppercase mx-auto tracking-wider"><a href="">Lien</a></p>   
                    </div>      
                </div>
            @elseif($ref->category_id == '2')
                <div class=" grid-item video-card card bg-white shadow-lg hover:shadow-xl " data-filter="video">
                    <a href="{{asset($ref->video)}}" class="card-link">   
                        <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                        <div class="card-content">
                            <div class="mt-2 py-3 pl-2 video-card-content ">
                                <p class="category video-color ">Video</p>
                                <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                                <p class="card-text">{{$ref->desc}}</p>
                            </div>
                        </div>
                    </a>
                    <div class="card-button">
                        <p class="text-center mt-5 mb-5 video-button uppercase mx-auto tracking-wider"><a href="">Lien</a></p>   
                    </div>      
                </div>
            @elseif($ref->category_id == '3')
                <div class=" grid-item podcast-card card bg-white shadow-lg hover:shadow-xl " data-filter="podcast">
                    <a href="{{asset($ref->podcast)}}" class="card-link">   
                        <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                        <div class="card-content">
                            <div class="mt-2 py-3 pl-2 podcast-card-content ">
                                <p class="category podcast-color ">Podcast</p>
                                <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                                <p class="card-text">{{$ref->desc}}</p>
                            </div>
                        </div>
                    </a>
                    <div class="card-button">
                        <p class="text-center mt-5 mb-5 podcast-button uppercase mx-auto tracking-wider"><a href="">Lien</a></p>   
                    </div>      
                </div>
            @elseif($ref->category_id == '4')
                <div class=" grid-item podcast-card card bg-white shadow-lg hover:shadow-xl " data-filter="articles">
                    <a href="{{asset($ref->link)}}" class="card-link">   
                        <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                        <div class="card-content">
                            <div class="mt-2 py-3 pl-2 podcast-card-content ">
                                <p class="category podcast-color ">Podcast</p>
                                <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                                <p class="card-text">{{$ref->desc}}</p>
                            </div>
                        </div>
                    </a>
                    <div class="card-button">
                        <p class="text-center mt-5 mb-5 podcast-button uppercase mx-auto tracking-wider"><a href="">Lien</a></p>   
                    </div>      
                </div>
        @endif
        @endforeach
    </div>
    @else
    <h4>pas de ressources actuellement dans la base de donnée</h4>
    @endif
</div>
</section>


<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="{{asset('js/SearchEngine.js')}}"></script>
<script>
    const searchengine = new SearchEngine();
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
