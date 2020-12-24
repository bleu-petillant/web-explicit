@extends('layouts.admin')

@section('admin.usage.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acceuil du site</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('usage.index') }}">liste des cas d'usages</a></li>
                        <li class="breadcrumb-item active">modifier le cas d'usage: <small class=" text-red-500 italic">{{ $usage->title }}</small> </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="my-5"></div>
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('usage.update',$usage->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <label for="link">modifiez votre lien externe<small class="text-danger">(exemples: https://www.youtube.fr) </small></label>
                        <input type="url" id="link" name="link" value="{{ $usage->link }}" class="form-control my-2" placeholder="{{ $usage->link }}">
                 
                    <div class="mt-4">
                        <p class="text-center font-bold">modifiez votre image si besoin:</p>
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
                                <span class=" text-red-600 text-center">image acuelle</span>
                                <img src="{{ asset($usage->image) }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                     <div class="my-4">
                      <label for="alt" class="label"> modifiez la description de l'image (ALT)</label>
                      <input type="text" id="alt" name="alt" value="{{ $usage->alt }}" class="form-control my-2" placeholder="{{ $usage->alt }}">
                    </div>

                    <div class="my-4"></div>
                    <label for="title">modifiez le titre</label>
                    <input type="text" id="title" name="title" value="{{ $usage->title }}" class="form-control my-2" placeholder="">
                    <div class="my-2"></div>
                    <label for="meta">modifiez la meta description (mini déscription pour les moteurs de recherches)<small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ $usage->meta }}" class="form-control my-2" placeholder="meta description">


                    <div class="my-4">
                    <label for="desc">modifiez la description de votre cas d'usage</label>
                    <input id="desc" name="desc" class="form-control my-2 " value="{{ $usage->desc }}" placeholder="{{ $usage->desc }}" >
                        <button class="btn btn-success " type="submit"><span class="fas fa-pen pr-2"></span>modifier ce cas d'usage</button>
                    </form>
            </div>
        </div>
    </div>

@endsection