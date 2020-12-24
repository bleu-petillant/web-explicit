@extends('layouts.app')
@section('course')
<section>
    <div class="container">
        <div class="flex">
            <div class="pt-1 container mx-auto">
                <div class="mb-2">
                    <div class="flex justify-end">
                        <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-indigo-200 ">
                            Question {{ $questions->question_position }}/{{$total}}
                        </span>
                        <input type="hidden" name="currquestion" id="currquestion"
                            value="{{ $questions->question_position }}">
                        <input type="hidden" name="totalquestion" id="totalquestion" value="{{ $total }}">
                    </div>
                </div>
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-indigo-200">
                    <div id="percent"
                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-500">
                    </div>
                </div>
                <div class="mx-auto">
                    <h4 class="text-center font-bold text-lg">{{$questions->content}}</h4>
                        <input type="hidden" name="questions[{{ $questions->question_position }}]" value="{{ $questions->id }}">
                </div>
            <div class="mx-auto container px-10">
                <form action="" method="post">
                    <div class="flex flex-col">
                        @csrf
                        @foreach ($questions->reponses as $r)
                        <span>{{$r->reponse}}</span>
                        <input type="checkbox" id="reponse[]" name="reponse[]" class="form-checkbox" value="{{$r->reponse}}">
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="gap-4 flex justify-evenly my-10">
                <div id="reset" class="hidden">
                    <a href="#!"><span class="fa-2x fas fa-redo"></span></a>
                </div>
                 <div id="valide" class="hidden">          
                        <button type="submit" id="checked" ><i class="fa-2x fas fa-chevron-circle-right"></i></button>
                </div>
            </div>
           </div>
        <div>

            {{--  start aside vidéo   --}}
        <div class="container">
            <video controls width="800" id="video_run">
                <source src="{{asset($questions->video)}}" type="video/mp4">
            </video>
        </div>
          {{--  end aside vidéo   --}}
    </div>
</section>
<script src="{{asset('js/VideoController.js')}}"></script>
<script>
let data = {!! json_encode($questions, JSON_HEX_TAG) !!};
let total = {!! json_encode($total, JSON_HEX_TAG) !!};
var getdata = new GetData(data,total);
</script>


@endsection
