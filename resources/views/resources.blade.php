@extends('layouts.app')
@section('resources')


    <div class="relative">
        <div id="loading" class="h-screen w-screen  bg-white absolute z-40 top-0 bot-0 left-0 right-0">
            <img class="block w-1/12 w-auto" src="{{ asset('img/logo/logo_couleur.svg') }}" alt="Workflow">
        </div>
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
                            <option  value="{{$cat->id}}" >{{$cat->name}} </option > 
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
                            <a href="" >
                                <img class="pdf-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-pdf-card-content">
                                    <p class="category pdf-color ">pdf</p>
                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p>
                                </div>
                                <p class="absolute news-ressource-button text-center my-4"><a href="{{$reference->pdf}}" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>
                            </a>
                        </div>
                    @elseif($reference->category_id == '2')
                        <div class="news-ressource video-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 relative">
                            <a href="" >
                                <img class="video-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-video-card-content">
                                    <p class="category video-color ">video</p>
                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p>
                                </div>
                                <p class="absolute news-ressource-button text-center my-4"><a href="{{$reference->link}}" class="video-button uppercase mx-auto tracking-wider">Lien</a></p>
                            </a>
                        </div>
                    @elseif($reference->category_id == '3')
                        <div class="news-ressource podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 relative">
                            <a href="" >
                                <img class="podcast-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-podcast-card-content">
                                    <p class="category podcast-color ">podcast</p>

                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p>
                                </div>
                                <p class="absolute news-ressource-button text-center my-4"><a href="{{$reference->link}}" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
                            </a>
                        </div>
                    @elseif($reference->category_id == '4')
                        <div class="news-ressource podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 relative">
                            <a href="" >
                                <img class="podcast-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 all-podcast-card-content">
                                    <p class="category podcast-color ">articles</p>

                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p>
                                </div>
                                <p class="absolute news-ressource-button text-center my-4"><a href="{{$reference->link}}" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
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
    <h2 class="font-bold text-5xl mt-4 mb-5 mx-8 tittle-all-ressource">Toute nos ressources</h2>

    <ul class="filters flex justify-around">
		<li><a  href="javascript:void(0);" data-filter="*">Tout</a></li>
		<li><a class="podcast-color" href="javascript:void(0);" data-filter="podcast">Podcast</a></li>
		<li><a class="video-color" href="javascript:void(0);" data-filter="video">video</a></li>
        <li><a class="pdf-color" href="javascript:void(0);" data-filter="pdf">pdf</a></li>
        <li><a class="podcast-color" href="javascript:void(0);" data-filter="articles">autres</a></li>
    </ul>
</div>


<div class="md:mx-8">


    @if($references->count() > 0)

        <div class="wrapper-grid ">
        @foreach ($references as $ref)
            @if ($ref->category_id == '1')
                <div class=" grid-item-test shadow-lg" data-filter="pdf">
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
                        <p class="text-center"><a class="text-center my-4 pdf-button uppercase mx-auto tracking-wider" href="">Lien</a></p>   
                    </div>  
                </div>
            @elseif($ref->category_id == '2')
                <div class=" grid-item-test shadow-lg" data-filter="video">
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
                        <p class="text-center"><a class="text-center my-4 video-button uppercase mx-auto tracking-wider" href="">Lien</a></p>   
                    </div>      
                </div>
            @elseif($ref->category_id == '3')
                <div class=" grid-item-test shadow-lg"  data-filter="podcast">
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
                        <p class="text-center"><a class="text-center my-4 podcast-button uppercase mx-auto tracking-wider" href="">Lien</a></p>   
                    </div>    
                </div>
            @elseif($ref->category_id == '4')
                <div class=" grid-item-test shadow-lg" data-filter="articles">
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
                        <p class="text-center" ><a class="text-center my-4 podcast-button uppercase mx-auto tracking-wider" href="">Lien</a></p>   
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
