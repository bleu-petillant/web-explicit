@extends('layouts.admin')

@section('admin.resources.create')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">dashboard</a></li>
                        <li class="breadcrumb-item active">créer une nouvelle ressource</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('reference.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('includes.errors')

                    <hr class="hr-light my-2">
                    <label for="title">Ajouter un titre pour votre ressource.</label>
                    <input type="text" id="title" name="title" value="{{ old('title')}}" class="form-control my-2" placeholder="titre de la ressource..." required>

                    <hr class="hr-light my-2">
                    <label for="category">selectionez une catégorie pour votre ressource</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">selectionez une catégorie</option>
                        @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    		<div class="form-group">
			                <label>Tags:</label>
                            <br/>
                            <input type="text" name="tags" id="tags">
                    		</div>

                    <hr class="my-2">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr">
                      <label class="custom-file-label" for="image">Sélectionner une image</label>
                        <div class="my-2"></div>
                      <label for="alt" class="label"> ajouter une description pour l'image (ALT)</label>
                      <input type="text" id="alt" name="alt" value="{{ old('alt')}}" class="form-control my-2" placeholder="description de l'image" required>
                    </div>

                     <hr class="hr-light my-2">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input my-2" name="pdf" id="pdf" lang="fr">
                      <label class="custom-file-label" for="pdf">Sélectionner votre PDF</label>
                    </div>
                    
                    <hr class="hr-light my-2">
                    <label for="link">ajouter votre lien externe<small class="text-danger">(exemples: https://www.monlien.fr)</small></label>
                    <input type="url" id="link" name="link" value="{{ old('link')}}" class="form-control my-2" placeholder="https://www.votrelien.com">

                    <hr class="hr-light my-2">
                    <label for="meta">ajouter une meta description pour mieux referencer votre ressource <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ old('title')}}" class="form-control my-2" placeholder="meta description" required>
                    <hr class="hr-light my-2">

                    <label for="desc">décrivez votre ressources: </label>
                    <textarea type="text" id="desc" name="desc" class="form-control my-5 editor" placeholder="décrivez votre ressources">{{ old('desc')}}</textarea>

                    <button class="btn btn-info  my-4" type="submit"><span class="fas fa-plus pr-2"></span>créez cette ressource</button>
                </form>
            </div>
        </div>
    </div>
    <script>
            var tags = [
        @foreach ($tags as $tag)
        {tag: "{{$tag}}" },
         @endforeach
    ];
    </script>
@endsection
