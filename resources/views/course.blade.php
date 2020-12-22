@extends('layouts.app')
@section('course')
<section >
    <div class="container">
        <div class="flex">
            <div>
                @foreach ($course->questions as $question)
                <button class="bg-transparent hover:bg-teal text-teal-dark font-semibold hover:text-white py-2 px-4 border border-teal hover:border-transparent rounded-full mr-2">
		                
		        </button>
                @endforeach

            </div>
                 <video controls width="800">
                    <source src="{{asset($course->video)}}" type="video/mp4">
                 </video>
        </div>
            <div class="text-center">
                    <p  class="text-lg">{{$course->desc}} </p>
                    <p class= "text-center text-xl">créer par  mr {{$course->teacher->name}} </p>
                    <p>{{ \Carbon\Carbon::parse($course->published_at)->diffForHumans() }}</p>
                 </div>
    </div>
</section>
@endsection
