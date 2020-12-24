@extends('layouts.admin')

@section('admin.course.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acceuil du site</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('course.index') }}">liste des formations</a></li>
                        <li class="breadcrumb-item active">modifier la formation</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="h4 mb-4">modifier la formation - <span class="text-danger font-perso font-italic">{{ $course->title }}</span></p>
                    <p>
                        <a href="{{ route('course.index') }}" class="btn btn-info btn-md">annuler et revenir à la liste des articles</a></li>
                    </p>
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('course.update',$course->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                     <div class="form-group">
                        <label class="text-center" for="primary_ressource">modifiez la première ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="primary_ressource">
                            <option value=""selected style="display: none">selectionez la resource</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label class="text-center" for="secondary_ressource">modifiez la deuxième ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="secondary_ressource">
                            <option value=""selected style="display: none">selectionez la resource</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 

                    <hr class="hr-light">

                    <div class="d-flex justify-content-around align-content-center">
                        <div class="col-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" lang="fr">
                                <label class="custom-file-label" for="image">Sélectionner une nouvelle image</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="max-width: 150px;max-height:150px;overflow:hidden">
                                <img src="{{ asset($course->image) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>

                    <hr class="hr-light">
                    <label for="alt" class="label"> ajouter une description pour l'image (ALT)</label>
                    <input type="text" id="alt" name="alt" value="{{ $course->alt}}" class="form-control my-2" placeholder="description de l'image">
                    <div class="my-2"></div>

                    <label for="title">modifiez le titre</label>
                    <input type="text" id="title" name="title" value="{{ $course->title }}" class="form-control my-2" placeholder="">

                    <label for="meta">modifiez votre meta description <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ $course->meta }}" class="form-control my-2" placeholder="meta description" required>


                    <hr class="hr-light">
                    <label for="content">modifiez votre article</label>
                    <textarea type="text" id="desc" name="desc" class="form-control my-2 editor" placeholder="">{{ $course->desc }}"</textarea>

                        <button class="btn btn-success btn-block" type="submit"><span class="fas fa-pen pr-2"></span>modifier la formation</button>
                    </form>
            </div>
        </div>
    </div>

@endsection
