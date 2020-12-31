@extends('layouts.app')
@section('course')
<section>
    <div class="container">
        <div class="flex ">
            <div class="pt-1 container mx-auto pt-5">
                <div class="mb-2">
                    <div class="flex justify-end">
                        <span id="numberquestion"
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-indigo-200 ">
                        </span>
                    </div>
                </div>
                <div class="pourcent-bar overflow-hidden h-2 mb-4 text-xs flex rounded bg-indigo-200">
                    <div id="percent"
                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-500">
                    </div>
                </div>
                <div class="mx-auto">
                    <h4 class="text-center font-bold text-lg" id="question"></h4>
                </div>
            <div class="mx-auto container px-10 question-container">
                <form action="" method="post">
                    <div class="flex flex-col" id="reponses">
                        @csrf
                    </div>
                    <input type="hidden" name="question_id" id="question_id">
                    <input type="hidden" name="position" id="position" value="{{$position}}">
                    <input type="hidden" name="course_id" id="course_id">
                    <input type="hidden" id="slug" name="slug" value="{{$course->slug}}">
                </form>
            </div>
            <div class="gap-4 flex justify-evenly my-10">
                <div id="reset" class="hidden">
                    <a href="#!"><span class="fa-2x fas fa-redo"></span></a>
                </div>
                <div id="valide" class="hidden">          
                        <button type="submit" id="check" ><i class="fa-2x fas fa-chevron-circle-right"></i></button>
                </div>

            </div>
            </div>
        <div>

            {{--  start aside vidéo   --}}
        <div class="container">
            <video controls playsinline autoplay width="800" id="video_run">
                <source src="{{asset($questions->video)}}" type="video/mp4">
            </video>
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
