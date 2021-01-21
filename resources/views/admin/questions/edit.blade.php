@extends('layouts.admin')

@section('admin.questions.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('question.index') }}">liste des questions</a></li>
                        <li class="breadcrumb-item active">modifier la question' - <span class="text-danger font-perso font-italic">{{ $question->content }}</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('question.update',$question->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                    <hr class="hr-light">
                    <div class="form-group">
                        <label class="text-center" for="primary_ressource">Modifier la première ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="primary_ressource">
                            <option value="{{ $first->id}}"selected>{{ $first->slug}}</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label class="text-center" for="secondary_ressource">Modifier la deuxième ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="secondary_ressource">
                            <option value="{{ $second->id}}"selected>{{ $second->slug}}</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="my-2"></div>
                    <div class="d-flex justify-content-around align-content-center">
                        <div class="col-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input my-2" name="video" id="video" lang="fr">
                                <label class="custom-file-label" for="video">Modifier la vidéo</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="max-width: 300px;max-height:300px;overflow:hidden">
                                <span>Vidéo actuelle</span>
                                    <embed src="{{asset($question->video)}}" type="video/mp4" width="250"height="250">
                            </div>
                        </div>
                    </div>
                    <div class="my-2"></div>
                    <label for="title">Modifier votre question</label>
                    <input type="text" id="content" name="content" value="{{ $question->content }}" class="form-control my-2" placeholder="{{ $question->content }}">
                    <div class="my-2"></div>
                    <input type="hidden" id="position" name="position" value="{{ $question->question_position }}">
                     <div class="form-group">
                    @if($reponses->count() > 0)
                        @foreach ($reponses as $reponse) 
                        <div class="my-2"></div>
                    <label for="reponse[]" class="control-label">Réponse valide ?</label>
                    <input type="text" id="reponse[]" name="reponse[]" class="form-control" value="{{ $reponse->reponse }}" placeholder="{{ $reponse->reponse }}">
                     <div class="my-2"></div>
                    <select name="correct[]" id="correct" class="form-select">
                        <option value="{{ $reponse->correct }}"selected style="display: none">{{ $reponse->correct }}</option>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                        @endforeach
                    @endif
                     </div>
                     <div class="my-2"></div>
                    <hr class="hr-light">
                    <label for="indice">Modifier votre indice</label>
                    <input type="text" id="indice" name="indice" class="form-control my-2 editor" value="{{ $question->indice }}" placeholder="{{ $question->indice }}">

                        <button class="btn btn-success btn-block" type="submit"><span class="fas fa-pen pr-2"></span>Modifier la question "{{ $question->content }}"</button>
                    </form>
            </div>
        </div>
    </div>

@endsection
