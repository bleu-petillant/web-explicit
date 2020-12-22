@extends('layouts.admin')

@section('admin.questions.create')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">dashboard admin</a></li>
                        <li class="breadcrumb-item active">créer un nouveau cours</li>
                        <li class="breadcrumb-item"><a href="{{ route('course.index') }}" >revenir à la liste des cours</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
            <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('question.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p class="h4 mb-4">créer une nouvelle questions</p>
                    @include('includes.errors')
                    <hr class="hr-light">
                     <div class="form-group">
                        <label class="text-center" for="course">selectionez une formation</label>
                        <select  name="course" id="course" class="custom-select custom-select-sm my-2">
                            <option value=""selected style="display: none">selectionez une formation</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                        </select>
                    </div> 
                     <div class="form-group">
                    <label for="content" class="control-label">votre question:</label>
                    <input type="text" id="content" name="content" class="form-control" placeholder="écrivez votre question">
                </div>
                <div class="form-group">
                    <label for="reponse1" class="control-label">reponse possible 1</label>
                    <input type="text" id="reponse1" name="reponse[]" class="form-control" placeholder="réponse 1....">
                    <div class="my-2"></div>
                    <select name="correct[]" id="correct" class="form-select">
                         <option value=""selected style="display: none">réponse correct ?</option>
                        <option value="1">vraie</option>
                        <option value="0">faux</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reponse2" class="control-label">reponse possible 2</label>
                    <input type="text" id="reponse2" name="reponse[]" class="form-control" placeholder="réponse 2....">
                    <div class="my-2"></div>
                    <select name="correct[]" id="correct" class="form-select">
                         <option value=""selected style="display: none">réponse correct ?</option>
                        <option value="1">vraie</option>
                        <option value="0">faux</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reponse3" class="control-label">reponse possible 3</label>
                    <input type="text" id="reponse3" name="reponse[]" class="form-control" placeholder="réponse 3....">
                     <div class="my-2"></div>
                    <select name="correct[]" id="correct" class="form-select">
                         <option value=""selected style="display: none">réponse correct ?</option>
                        <option value="1">vraie</option>
                        <option value="0">faux</option>
                    </select>
                </div>
                 <div class="form-group">
                    <label for="reponse4" class="control-label">reponse possible 4</label>
                    <input type="text" id="reponse4" name="reponse[]" class="form-control" placeholder="réponse 4....">
                <div class="my-2"></div>
                    <select name="correct[]" id="correct" class="form-select">
                         <option value=""selected style="display: none">réponse correct ?</option>
                        <option value="1">vraie</option>
                        <option value="0">faux</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reponse5" class="control-label">reponse possible 5</label>
                    <input type="text" id="reponse5" name="reponse[]" class="form-control" placeholder="réponse 5....">
                <div class="my-2"></div>
                    <select name="correct[]" id="correct" class="form-select">
                         <option value=""selected style="display: none">réponse correct ?</option>
                        <option value="1">vraie</option>
                        <option value="0">faux</option>
                    </select>
                </div>
                    <button class="btn btn-success my-3" type="submit"><span class="fas fa-plus pr-2"></span>publiez votre questions</button>
                </form>
            </div>
        </div>
    </div>

@endsection
