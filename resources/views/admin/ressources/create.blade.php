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

                  
                    <label for="title">Ajouter un titre pour votre ressource.</label>
                    <input type="text" id="title" name="title" value="{{ old('title')}}" class="form-control my-2" placeholder="titre de la ressource..." required>

                    <div class=" my-4"></div>
                    <label for="category">selectionez une catégorie pour votre ressource</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">selectionez une catégorie</option>
                        @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                     <div class=" my-4"></div>
                    		<div class="form-group">
                                <label for="tags">écrivez vos tags ici <strong class="text-red-800">(5 maximum)</strong>(mots clef court de quelques lettres qui seront associer à cette resources )</label>
                                <input data-role="tagsinput" type="text" name="tags" id="tags" placeholder="psychologie,cerveau,humain,psy,cas,maladie etc......">
                            </div>
                     <div class=" my-4"></div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input my-4" name="image" id="image" lang="fr">
                      <label class="custom-file-label" for="image">Sélectionner une image</label>
                        
                      <label for="alt" class="label"> ajouter une description pour l'image (ALT)</label>
                      <input type="text" id="alt" name="alt" class="form-control my-4" value="{{ old('alt')}}" placeholder="description de l'image" required>
                    </div>

                      <div class=" my-6"></div>
                      <p class=" text-center my-4">si cette ressource est un PDF:</p>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input my-2" name="pdf" id="pdf" lang="fr">
                      <label class="custom-file-label" for="pdf">Sélectionner votre PDF </label>
                    </div>
                    
                     <div class=" my-4"></div>
                     <p class=" text-center my-4">si cette ressource est un lien vers un autre site web:</p>
                    <label for="link">ajouter votre lien externe ici:<small class="text-danger">(exemples: https://www.monlien.fr) </small></label>
                    <input type="url" id="link" name="link" value="{{ old('link')}}" class="form-control my-2" placeholder="https://www.votrelien.com">

                    <div class=" my-4"></div>
                    <label for="meta">ajouter une meta description pour mieux referencer votre ressource <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ old('meta')}}" class="form-control my-2" placeholder="meta description" required>
           
                    <div class=" my-4"></div>
                    <label for="desc">décrivez votre ressources: </label>
                    <input type="text" id="desc" name="desc" class="form-control my-2" value="{{ old('desc')}}" placeholder="décrivez votre ressources">
                    <div>
                        <label for="private">ressource privée ?</label>
                        <input type="checkbox" name="private" id="private" class="form-checkbox" value="1">
                    </div>
                     <div class=" my-4"></div>
                    <button class="btn btn-info  my-4" type="submit"><span class="fas fa-plus pr-2"></span>créez cette ressource</button>
                </form>
            </div>
        </div>
    </div>
<script>
    $(function () {
        $("input[type=checkbox]").change(function(){
            if($(this).is(':checked')){
                $(this).val(1);
            }else{
                $(this).val(0);
            }
        });
    });
</script>
@endsection
