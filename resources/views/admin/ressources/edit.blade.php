@extends('layouts.admin')

@section('admin.resources.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acceuil du site</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reference.index') }}">liste des ressources</a></li>
                        <li class="breadcrumb-item active">modifier la ressource</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="h4 mb-4">modifier la ressources - <span class="text-danger font-perso font-italic">{{ $reference->title }}</span></p>
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('reference.update',$reference->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <label for="category">selectionez une catégorie</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">selectionez une catégorie</option>
                        @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" @if($reference->category_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                        @endforeach
                    </select>

                   
                    <label for="link">ajouter votre lien externe<small class="text-danger">(exemples: https://www.monlien.fr)</small></label>
                    <input type="url" id="link" name="link" value="{{ old('link')}}" class="form-control my-2" placeholder="{{ $reference->link }}">

                
                    <div class="form-group">
                        <p class="text-center">modifiez les tags</p>
                        @foreach ($tags as $tag)
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}"
                            @foreach ($reference->tags as $t)
                                @if ($tag->id == $t->id)checked

                                @endif
                             @endforeach>
                            <label class="custom-control-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                        </div>
                        @endforeach 
                    </div>
                    <div class="d-flex justify-content-around align-content-center">
                        <div class="col-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" lang="fr">
                                <label class="custom-file-label" for="image">Sélectionner une nouvelle image</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="max-width: 150px;max-height:150px;overflow:hidden">
                                <img src="{{ asset($reference->image) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>


                    <label for="title">modifiez le titre</label>
                    <input type="text" id="title" name="title" value="{{ $reference->title }}" class="form-control my-2" placeholder="">

                    <label for="meta">modifiez votre meta description <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ $reference->meta }}" class="form-control my-2" placeholder="meta description">

                     <div class="my-2">
                      <label for="alt" class="label"> ajouter une description pour l'image (ALT)</label>
                      <input type="text" id="alt" name="alt" value="{{ old('alt')}}" class="form-control my-2" placeholder="{{ $reference->alt }}">
                    </div>
                    <hr class="hr-light">
                    <label for="desc">modifiez la description de votre ressource</label>
                    <textarea id="desc" name="desc" class="form-control my-2 " value="{{ $reference->desc }}" placeholder="{{ $reference->desc }}"  rows="5" cols="5"></textarea>
                        <button class="btn btn-success " type="submit"><span class="fas fa-pen pr-2"></span>modifier la ressource</button>
                    </form>
            </div>
        </div>
    </div>

@endsection
