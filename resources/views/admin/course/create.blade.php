@extends('layouts.admin')

@section('admin.course.create')

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
                <form class="text-center" action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p class="h4 mb-4">créer un nouveau cours</p>
                    <p>
                        
                    </p>
                    @include('includes.errors')
                    {{-- <label for="category">selectionez une catégorie</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">selectionez une catégorie</option>
                        @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select> --}}
                    <hr class="hr-light">
                     <div class="form-group">
                        <label class="text-center" for="primary_ressource">selectionez la première ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="primary_ressource">
                            <option value=""selected style="display: none">selectionez la resource</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label class="text-center" for="secondary_ressource">selectionez la deuxième ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="secondary_ressource">
                            <option value=""selected style="display: none">selectionez la resource</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <hr class="hr-light my-2">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr">
                      <label class="custom-file-label" for="image">Sélectionner une image</label>

                      <label for="alt" class="label"> ajouter une description pour l'image (ALT)</label>
                      <input type="text" id="alt" name="alt" value="{{ old('alt')}}" class="form-control my-2" placeholder="description de l'image" required>
                    </div>

                    <label for="title">ajouter un titre</label>
                    <input type="text" id="title" name="title" value="{{ old('title')}}" class="form-control my-2" placeholder="titre du cours" required>
                    <hr class="hr-light my-2">
                    <label for="meta">ajouter une meta description <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ old('title')}}" class="form-control my-2" placeholder="meta description" required>

                    <hr class="hr-light">
                    <label for="desc">décrivez votre cours</label>
                    <textarea type="text" id="desc" name="desc" class="form-control my-5 editor" placeholder="décrivez votre cours ici....">{{ old('desc')}}</textarea>

                    <button class="btn btn-success my-3" type="submit"><span class="fas fa-plus pr-2"></span>publiez votre cours</button>
                </form>
            </div>
        </div>
    </div>

@endsection
