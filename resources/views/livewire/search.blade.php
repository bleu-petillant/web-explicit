
    <div class="inline-block relative" x-data="{ open:true }">
    <input @click.away="{ open = false; @this.resetIndex(); }" @click="{ open = true }" type="text"
        class=" input focus:outline-none placeholder-cool-gray-500 " placeholder="Recherche" wire:model="query"
        wire:keydown.arrow-down.prevent="incrementIndex" wire:keydown.arrow-up.prevent="decrementIndex"
    />

    <select name="category_id" id="category_id" wire:model="category_id" @click="{ open = true }"  >
     <option value="" selected>Toutes les catégories</option>
        @foreach ($category as $cat)
        <option  value="{{$cat->id}}" wire:click="searchByCat">{{$cat->name}} </option > 
        @endforeach
    </select>
    <section class="ressources-news contenu">
        <div class="flex mx-auto py-2 news-ressource-cards">
@if (strlen($query) > 1)
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
    
  </div>
    @else
    <span class="text-red-400">0 résultats pour "{{ $query }}"</span>
    @endif

</div>

<div id="all-resource">
<section class="ressources-news contenu">
  <h2 class="font-bold text-5xl mt-4 mb-5 mx-8">Nouveautés</h2>

  <div class="flex mx-auto py-2 news-ressource-cards" wire:model="references">
    
     @foreach ($ressources as $reference)
     @if ($reference->category_id == '1')
        <div class="pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
        <a href="{{$reference->pdf}}" >
        <img class="pdf-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
                <div class="mt-2 py-3 pl-2 pdf-card-content">
                    <p class="category pdf-color ">pdf</p>
                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                    <p class="card-text">{{$reference->desc}}</p>
                 @foreach ($reference->tags as $tag)
                     <span class="text-xs font-semibold inline-block py-1 px-2  rounded-full pdf-color bg-gray-200 uppercase last:mr-0 mr-1" >#{{$tag->name}}</span>
                 @endforeach   
                </div>
                <p class="text-center mt-5 mb-5"><a href="{{$reference->pdf}}" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>
    </div>
     @elseif($reference->category_id == '2')
         <div class="video-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
        <a href="{{$reference->link}}" >
        <img class="video-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
        
                <div class="mt-2 py-3 pl-2 video-card-content">
                    <p class="category video-color ">video</p>

                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                    <p class="card-text">{{$reference->desc}}</p>
                    @foreach ($reference->tags as $tag)
                        <span class="text-xs font-semibold inline-block py-1 px-2  rounded-full video-color bg-gray-200 uppercase last:mr-0 mr-1" >#{{$tag->name}}</span>
                 @endforeach   
                </div>
                <p class="text-center mt-5 mb-5"><a href="{{$reference->link}}" class="video-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>
    </div>
    @elseif($reference->category_id == '3')
        <div class="podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
        <a href="{{$reference->link}}" >
        <img class="podcast-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
        
                <div class="mt-2 py-3 pl-2 podcast-card-content">
                    <p class="category podcast-color ">podcast</p>

                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                    <p class="card-text">{{$reference->desc}}</p>
                    @foreach ($reference->tags as $tag)
                         <span class="text-xs font-semibold inline-block py-1 px-2  rounded-full podcast-color bg-gray-200 uppercase last:mr-0 mr-1" >#{{$tag->name}}</span>
                    @endforeach   
                </div>
                <p class="text-center mt-5 mb-5"><a href="{{$reference->link}}" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>
    </div>
    @else
        <div class="podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
        <a href="{{$reference->link}}" >
        <img class="podcast-card card-image w-full h-40 object-cover" src="{{asset($reference->image)}}" alt="{{$reference->alt}}">
        
                <div class="mt-2 py-3 pl-2 podcast-card-content">
                    <p class="category podcast-color ">article</p>

                    <h3 class="card-title text-2xl font-bold">{{$reference->title}}</h3>
                    <p class="card-text">{{$reference->desc}}</p>
                    @foreach ($reference->tags as $tag)
                         <span class="text-xs font-semibold inline-block py-1 px-2  rounded-full podcast-color bg-gray-200 uppercase last:mr-0 mr-1" >#{{$tag->name}}</span>
                    @endforeach   
                </div>
                <p class="text-center mt-5 mb-5"><a href="{{$reference->link}}" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>
    </div>
     @endif

    @endforeach
    @else
        <p class="text-center mt-5 mb-5" >aucune ressources actuellement dans la base de donnée</p>
    @endif
    
  </div>

@endif


</div>
