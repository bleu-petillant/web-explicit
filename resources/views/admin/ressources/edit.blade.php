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
                        <label for="category">modifiez la catégorie (si besoin)</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">selectionez une catégorie</option>
                        @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" @if($reference->category_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                        @endforeach
                    </select>

                    
                    @if ($reference->pdf  != 'pdf')
                    <p class="text-center my-4 text-red-600">cette ressource est  un pdf interne, les lien externes ne sont pas autoriser dans ce cas</p>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input my-2" name="pdf" id="pdf" lang="fr">
                        <label class="custom-file-label" for="pdf">Modifiez votre PDF </label>
                    </div>
                        @else
                        <p class="text-center text-red-600 my-4">cette ressource est  un lien externe</p>
                        <label for="link">ajouter votre lien externe<small class="text-danger">(exemples: https://www.monlien.fr) sauf pour les  pdf</small></label>
                        <input type="url" id="link" name="link" value="{{ $reference->link }}" class="form-control my-2" placeholder="{{ $reference->link }}">
                    @endif


                    <div class="my-8"></div>
                    <div class="form-group mb-4">
                        @if ($tags->count() > 0 )
                         <p class="text-center font-bold my-4">modifiez les tags: (mots clef cours de quelques lettres)</p>
                        @foreach ($tags as $tag)
                         <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->tag_slug }}" checked>
                            <label class="custom-control-label" for="tag{{ $tag->id }}">{{ $tag->tag_slug }}</label>
                        </div> 
                        @endforeach 
                        @else
                        <p class="text-center text-red-500 my-3">vous n'avez pas encore créée de tags pour cette ressource</p> 
                            <div class="form-group">
                                <label for="tags">créer vos tags ici <strong class="text-red-800">(5 maximum)</strong></label>
                                <input data-role="tagsinput" type="text" name="tags" id="tags" >
                            </div>
                         @endif
                    </div>
                    <div class="mt-4">
                        <p class="text-center font-bold">modifiez votre image:</p>
                    </div>
                    <div class="d-flex justify-content-center align-content-center my-8">
                        <div class="col-6 my-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" lang="fr">
                                <label class="custom-file-label" for="image">Sélectionner une nouvelle image si besoin</label>
                            </div>
                        </div>
                        <div class="col-4 my-4">
                            <div style="max-width: 200px;max-height:200px;overflow:hidden">
                                <img src="{{ asset($reference->image) }}" class="img-fluid">
                                <span class=" text-red-600 text-center">image acuelle</span>
                            </div>
                        </div>
                    </div>

                    <div class="my-4"></div>
                    <label for="title">modifiez le titre</label>
                    <input type="text" id="title" name="title" value="{{ $reference->title }}" class="form-control my-2" placeholder="">
                    <div class="my-2"></div>
                    <label for="meta">modifiez la meta description (mini déscription pour les moteurs de recherches)<small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ $reference->meta }}" class="form-control my-2" placeholder="meta description">

                     <div class="my-4">
                      <label for="alt" class="label"> modifiez la description de l'image (ALT)</label>
                      <input type="text" id="alt" name="alt" value="{{ $reference->alt }}" class="form-control my-2" placeholder="{{ $reference->alt }}">
                    </div>
                    <div class="my-4">
                    <label for="desc">modifiez la description de votre ressource</label>
                    <input id="desc" name="desc" class="form-control my-2 " value="{{ $reference->desc }}" placeholder="{{ $reference->desc }}" ></input>
                        <button class="btn btn-success " type="submit"><span class="fas fa-pen pr-2"></span>modifier la ressource</button>
                    </form>
            </div>
        </div>
    </div>

@endsection
