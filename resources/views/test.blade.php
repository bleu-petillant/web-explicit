@extends('layouts.app')
@section('resources')

<section>

    <ul class="filters flex justify-around">
		<li><a  href="javascript:void(0);" data-filter="*">Tout</a></li>
		<li><a class="podcast-color" href="javascript:void(0);" data-filter="podcast">Podcast</a></li>
		<li><a class="video-color" href="javascript:void(0);" data-filter="video">video</a></li>
        <li><a class="pdf-color" href="javascript:void(0);" data-filter="pdf">pdf</a></li>
        <li><a class="podcast-color" href="javascript:void(0);" data-filter="articles">autres</a></li>
    </ul>

    @if($references->count() > 0)

        <div class="wrapper-grid ">
        @foreach ($references as $ref)
            @if ($ref->category_id == '1')
                <div class="grid-item grid-item-test" data-filter="pdf">
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
                <div class="grid-item grid-item-test" data-filter="video">
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
                <div class="grid-item grid-item-test"  data-filter="podcast">
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
                <div class="grid-item grid-item-test" data-filter="articles">
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

</section>

<script>

$(document).ready(function(){

    $('.grid').isotope({
        // options
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
        });



}

</script>

@endsection