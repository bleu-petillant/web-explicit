<div x-data="{ open:true }">

    <section class="search-bar">
        <h1 class="text-center text-white text-6xl font-bold"> Ressources</h1>
        <div class="wrapper">
            <div class="search_box">
                <div class="flex" > 
                        <div class="search_field">    
                                <i class="fas fa-search"></i>
                                <input id="searchBar"  @click="{ open = true }" type="text"
                                class="input focus:outline-none placeholder-cool-gray-500 " placeholder="Recherche" wire:model="query"
                                />
                        </div>



                    <select name="category_id" id="category_id" wire:model="category_id" class="dropdown" @click="{ open = true }"  >
                        <div  class="default_option">
                            <option value="" selected>Toutes les catégories</option>
                            @foreach ($category as $cat)
                            <option  value="{{$cat->id}}" >{{$cat->name}} </option > 
                            @endforeach
                        </div>
                        
                    </select>

                    

                </div>           
            </div>
        </div> 
    </section>

    <section class="ressource-news contenu">
        <h2 class="font-bold text-5xl mt-4 mb-5 mx-8">Nouveautés</h2>
        @if (strlen($query) > 1)
            @if (count($references)  >  0)
                <div class="flex mx-auto py-2 news-ressource-cards " wire:model="references">
                    
                        @foreach ($references as $reference)

                            @if ($reference->category_id == '1')
                                <div class="pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
                                    <a href="" >
                                        <img class="pdf-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                        <div class="mt-2 py-3 pl-2 pdf-card-content">
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
                                        <div class="mt-2 py-3 pl-2 video-card-content">
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
                                        <div class="mt-2 py-3 pl-2 podcast-card-content">
                                            <p class="category podcast-color ">podcast</p>

                                            <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                            <p class="card-text">{{$reference->desc}}</p>
                                        </div>
                                        <p class="text-center mt-5 mb-5"><a href="{{$reference->link}}" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
                                    </a>
                                </div>
                            @else
                                <div class="articles-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
                                    <a href="" >
                                        <img class="articles-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                        <div class="mt-2 py-3 pl-2 podcast-card-content">
                                            <p class="category articles-color ">articles</p>

                                            <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                            <p class="card-text">{{$reference->desc}}</p>
                                        </div>
                                        <p class="text-center mt-5 mb-5"><a href="{{$reference->link}}" class="articles-button uppercase mx-auto tracking-wider">Lien</a></p>
                                    </a>
                                </div>
                            @endif

                        @endforeach

                </div>

            @else
                <span class="text-red-400">0 résultats pour "{{ $query }}"</span>
            @endif

        @else
        
            <div class="flex mx-auto py-2 news-ressource-cards" wire:model="references">
                @if (count($references)  >  0)
                    @foreach ($references as $reference)
                    
                    @if ($reference->category_id == '1')
                        <div class="pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
                            <a href="" >
                                <img class="pdf-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 pdf-card-content">
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
                                <div class="mt-2 py-3 pl-2 video-card-content">
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
                                <div class="mt-2 py-3 pl-2 podcast-card-content">
                                    <p class="category podcast-color ">podcast</p>

                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p>
                                </div>
                                <p class="text-center mt-5 mb-5"><a href="{{$reference->link}}" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
                            </a>
                        </div>
                    @else
                        <div class="articles-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
                            <a href="" >
                                <img class="articles-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                                <div class="mt-2 py-3 pl-2 podcast-card-content">
                                    <p class="category articles-color ">articles</p>

                                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                                    <p class="card-text">{{$reference->desc}}</p>
                                </div>
                                <p class="text-center mt-5 mb-5"><a href="{{$reference->link}}" class="articles-button uppercase mx-auto tracking-wider">Lien</a></p>
                            </a>
                        </div>
                    @endif

                    @endforeach
                    @else
                @endif
            </div> 
        @endif

        <div class=" py-2">

            <div class=" shadow md:flex bg-white rounded-xl p-8 md:p-0 mx-8">
                    <img class="w-32 h-32 md:w-48 md:h-auto  rounded-l-lg " src="img/ressource/explicitation-book.jpg" alt="" width="384" height="512">

                    <div class=" podcast-card-content p-6 ">
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
</div>







