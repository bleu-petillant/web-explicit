@extends('layouts.app')
@section('usage')

<section id="usage_title" class="p-5">
    <div class="flex w-3/4 mx-auto">
        <div class="w-3/4">
            <h1 class="text-white text-6xl font-bold uppercase leading-none">Cas d'usage</h1>
        </div>    
    </div> 
</section>

    @foreach ($usages as $usage)
        @if ($usage->id%2 == 1)
            <div class="flex my-16">
                <div class="w-7/12">
                    <iframe class="w-full h-full" src="{{$usage->link}}" frameborder="0"></iframe>
                </div>
                <div class="ressources-text-usage w-5/12">
                    <h2 class="ressource-home-title uppercase font-bold text-4xl ml-4 pr-4 w-3/4" >{{$usage->title}}</h2>
                    <p class=" text-xl text-justify px-4 w-3/4">{{$usage->desc}}</p>
                </div>
            </div>
        @else
            <div class="flex my-16"> 
                <div class="ressources-text-usage w-5/12">
                    <h2 class="ressource-home-title uppercase  font-bold text-4xl ml-4 pr-4 w-3/4" >{{$usage->title}}</h2>
                    <p class=" text-xl text-justify px-4 w-3/4">{{$usage->desc}}</p>
                </div>
                <div class="w-7/12">
                    <iframe class="w-full h-full" src="{{$usage->link}}" frameborder="0"></iframe>
                </div>
            </div>
        @endif
    @endforeach


@endsection