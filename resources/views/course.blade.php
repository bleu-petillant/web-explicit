@extends('layouts.formation')
@section('course')
<section>
        

    <div class="row flex-column-reverse flex-lg-row">
        <div class="col-lg-4 pt-1 container left-quizz-container mx-auto pt-5">
            <a href="{{route('home')}}">
                <img class="block lg:hidden w-auto logo-course-explicit" src="{{ asset('img/logo/logonoir.png') }}" alt="Workflow" >
                <img class="hidden lg:block w-auto logo-course-explicit" src="{{ asset('img/logo/logonoir.png') }}" alt="Workflow" >
            </a>
            <div class="mb-2 mt-20">
                <div class="flex justify-end">
                    <p id="numberquestion"
                        class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full  current-number-pourcent ">
                    </p>

                </div>
            </div>

            <div class="pourcent-bar overflow-hidden h-2 mb-4 text-xs flex rounded pourcent-bar-back">
                <div id="percent"
                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-500">
                </div>
            </div>

            <div class="">
                <h4 class="font-bold mx-auto text-lg question-content" id="question"></h4>
            </div>

            <div class="mx-auto container px-10 question-container">
                <form action="" method="post" id="reponses_form">
                    @csrf
                    <div class="flex flex-col" id="reponses">
                        
                    </div>
                    <input type="hidden" name="question_id" id="question_id">
                    <input type="hidden" name="position" id="position" value="{{$position}}">
                    <input type="hidden" name="course_id" id="course_id">
                    <input type="hidden" id="slug" name="slug" value="{{$course->slug}}">
                </form>
            </div>

            <div id="indice"></div>
            <div id="ressources" class="flex ressource-course-container  mx-auto">
                <p>Avant de retenter ta chance, voici ce que tu dois connaitre : </p>
            </div>
            <div id="nextcourse"></div>
            <div class="gap-4 flex justify-evenly mt-10">
            <div id="reset"  class="hidden">
                <button type="submit" id="resetbutton" ><i class="fa-2x fas fa-redo"></i></button> 
            </div>
            <div id="valide" class="hidden">          
                    <button type="submit" id="check" class="hover:underline ">Valider cette réponse ?</button>
            </div>
            </div>
        </div>

        {{--  start aside vidéo   --}}
        <div class="col-lg-8 formation-right">
            <div class="right-quizz-container">
                <video controls playsinline autoplay id="video_run" class="w-full">
                    <source src="{{asset($questions->video)}}" type="video/mp4">
                </video>
            </div>
        </div>
        {{--  end aside vidéo   --}}
    </div>
</section>

<script src="{{asset('js/GetData.js')}}"></script>
<script src="{{asset('js/CheckReponse.js')}}"></script>
<script src="{{asset('js/VideoController.js')}}"></script>

<script>
    let data = {!! json_encode($questions, JSON_HEX_TAG) !!};
    let total = {!! json_encode($total, JSON_HEX_TAG) !!};
    var getdata = new GetData(data,total);
    var reponse = new CheckResponse();
    var  video = new VideoController();
</script>


@endsection
