@extends('layouts.app')
@section('resources')


        <div id="loading" class="h-full fixed w-full bg-white  z-40 top-0 left-0 ">
            <img class="block w-1/12 w-auto logo-loading" src="{{ asset('img/logo/logo_couleur.svg') }}" alt="Workflow">
            <img class="gif-loading" src="{{ asset('img/785.gif') }}" alt="">
        </div>


    <section class="search-bar w-screen">
        <h1 class="text-white sm:text-3xl md:text-6xl font-bold"> Ressources</h1>
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
                            <option  value="{{$cat->id}}" >{{$cat->name}}</option > 
                            @endforeach
                        </div>
                    </select>

                </div>           
            </div>
        </div> 
    </section>


    <section class="ressource-news contenu">
        <h2 id="result" class="font-bold  sm:text-2xl md:text-5xl mt-4 mb-5 mx-8">Nouveautés</h2>
        <span id="noresult"></span>
            <div class="flex mx-auto py-2 news-ressource-cards m-5">
                @if (count($references)  >  0)
                    @foreach ($references as $reference)
                    
                    @if ($reference->category_id == '1')
                        <div class="news-ressource pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 relative">
                            <a href="{{$reference->pdf}}"  target="__blank">
                                <img class="pdf-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-pdf-card-content">
                                    <p class="category pdf-color ">pdf</p>
                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p>
                                    <span>publier le {{ \Carbon\Carbon::parse($reference->published_at)->diffForHumans() }}</span>
                                </div>
                                <p class="absolute news-ressource-button text-center my-4"><a href="{{$reference->pdf}}" class="pdf-button uppercase mx-auto tracking-wider" target="__blank">Lien</a></p>
                            </a>
                        </div>
                    @elseif($reference->category_id == '2')
                        <div class="news-ressource video-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 relative">
                            <a href="{{$reference->link}}" target="__blank" >
                                <img class="video-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-video-card-content">
                                    <p class="category video-color ">vidéo</p>
                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p><br>
                                   <span>publier le {{ \Carbon\Carbon::parse($reference->published_at)->diffForHumans() }}</span>
                                </div>
                                <p class="absolute news-ressource-button text-center my-4"><a href="{{$reference->link}}" class="video-button uppercase mx-auto tracking-wider" target="__blank">Lien</a></p>
                            </a>
                        </div>
                    @elseif($reference->category_id == '3')
                        <div class="news-ressource podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 relative">
                            <a href="{{$reference->link}}" target="__blank" >
                                <img class="podcast-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-podcast-card-content">
                                    <p class="category podcast-color ">podcast</p>

                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p><br>
                                   <span>publier le {{ \Carbon\Carbon::parse($reference->published_at)->diffForHumans() }}</span>
                                </div>
                                <p class="absolute news-ressource-button text-center my-4"><a href="{{$reference->link}}" target="__blank" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
                            </a>
                        </div>
                    @elseif($reference->category_id == '4')
                        <div class="news-ressource podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 relative">
                            <a href="{{$reference->link}}" target="__blank" >
                                <img class="podcast-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-podcast-card-content">
                                    <p class="category podcast-color ">article</p>

                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p><br>
                                    <span>publier le {{ \Carbon\Carbon::parse($reference->published_at)->diffForHumans() }}</span>
                                </div>
                                <p class="absolute news-ressource-button text-center my-4"><a href="{{$reference->link}}" target="__blank" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
                            </a>
                        </div>
                    @endif
                    
                    @endforeach
                    @else
                @endif
            </div> 

            <div class=" py-2">

            <div class=" shadow md:flex bg-white rounded-xl sm:mx-2 md:mx-8 book-ressource">
                    <img class="w-32 h-32 md:w-48 md:h-auto  rounded-l-lg " src="img/ressource/explicitation-book.jpg" alt="" width="384" height="512">

                    <div class=" all-podcast-card-content p-6 ">
                        <p class="category podcast-color ">Livre</p>
                        <h3 class="card-title text-2xl font-bold">Titre de livre, Nom de l'auteur.</h3>
                        <p class=" mb-3 text-lg ">
                        Vestibulum ultricies, justo nec lacinia auctor, tellus massa efficitur metus, nec <br>
                        tempor lectus augue eu nibh. Quisque eget nulla magna. 
                        </p>
                        <a href="" class="flex-none podcast-button uppercase mx-auto tracking-wider">Lien</a>
                    </div>

            </div>
        </div>
    </section>




<section class="all-ressources ">
<div class="contenu-all-ressource ">
    <h2 class="font-bold text-5xl mt-4 mb-5 mx-8 tittle-all-ressource">Toutes nos ressources</h2>

    <ul class="filters flex justify-around">
		<li><a  href="javascript:void(0);" data-filter="*">Tout</a></li>
		<li><a class="podcast-color" href="javascript:void(0);" data-filter="podcast">Podcast</a></li>
		<li><a class="video-color" href="javascript:void(0);" data-filter="video">Vidéo</a></li>
        <li><a class="pdf-color" href="javascript:void(0);" data-filter="pdf">Pdf</a></li>
        <li><a class="podcast-color" href="javascript:void(0);" data-filter="articles">Article</a></li>
    </ul>
</div>


<div  class="md:mx-8 container-all-ressource ">


    @if($references->count() > 0)

        <div id="container-all-ressource" class="wrapper-grid isotop">
        @foreach ($references as $ref)
            @if ($ref->category_id == '1')
                <div class=" grid-item-test shadow-lg" data-filter="pdf">
                    <a href="{{$ref->pdf}}" class="card-link" target="_blank">   
                        <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                        <div class="card-content">
                            <div class="mt-2 py-3 pl-2 pdf-card-content ">
                                <p class="category pdf-color ">Pdf</p>
                                <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                                <p class="card-text">{{$ref->desc}}</p><br>
                                   <span>publier le {{ \Carbon\Carbon::parse($ref->published_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p class="absolute news-ressource-button text-center my-4"><a href="{{$ref->pdf}}" class="pdf-button uppercase mx-auto tracking-wider" target="_blank">Lien</a></p>
                    </a>
                </div>
            @elseif($ref->category_id == '2')
                <div class=" grid-item-test shadow-lg" data-filter="video">
                    <a href="{{asset($ref->video)}}" class="card-link" target="_blank">   
                        <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                        <div class="card-content">
                            <div class="mt-2 py-3 pl-2 video-card-content ">
                                <p class="category video-color ">Vidéo</p>
                                <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                                <p class="card-text">{{$ref->desc}}</p><br>
                                    <span>publier le {{ \Carbon\Carbon::parse($ref->published_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p class="absolute news-ressource-button text-center my-4"><a href="{{$ref->link}}" class="video-button uppercase mx-auto tracking-wider" target="_blank">Lien</a></p>
                    </a>   
                </div>
            @elseif($ref->category_id == '3')
                <div class=" grid-item-test shadow-lg"  data-filter="podcast">
                    <a href="{{asset($ref->podcast)}}" class="card-link" target="_blank">   
                        <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                        <div class="card-content">
                            <div class="mt-2 py-3 pl-2 podcast-card-content ">
                                <p class="category podcast-color ">Podcast</p>
                                <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                                <p class="card-text">{{$ref->desc}}</p><br>
                                    <span>publier le {{ \Carbon\Carbon::parse($ref->published_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p class="absolute news-ressource-button text-center my-4"><a href="{{$ref->link}}" class="podcast-button uppercase mx-auto tracking-wider" target="_blank">Lien</a></p>
                    </a>  
                </div>
            @elseif($ref->category_id == '4')
                <div class=" grid-item-test shadow-lg" data-filter="articles">
                    <a href="{{asset($ref->link)}}" class="card-link" target="_blank">   
                        <img class=" card-image w-full h-40 object-cover" src="{{asset($ref->image)}}" alt="{{$ref->alt}}">
                        <div class="card-content">
                            <div class="mt-2 py-3 pl-2 podcast-card-content ">
                                <p class="category podcast-color ">Article</p>
                                <h3 class="card-title text-2xl font-bold">{{$ref->title}}</h3>
                                <p class="card-text">{{$ref->desc}}</p><br>
                                  <span>publier le {{ \Carbon\Carbon::parse($ref->published_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p class="absolute news-ressource-button text-center my-4"><a href="{{$ref->link}}" class="podcast-button uppercase mx-auto tracking-wider" target="_blank">Lien</a></p>
                    </a>
                </div>
            @endif
        @endforeach
        </div>
    @else
        <h4>Pas de ressources actuellement dans la base de donnée</h4>
    @endif   
</div>
</section>


<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="{{asset('js/SearchEngine.js')}}"></script>
<script>

$(document).on("load",function(){
    $("#loadind").hide();
});

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
