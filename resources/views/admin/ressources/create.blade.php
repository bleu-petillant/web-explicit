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
                    <select name="category" id="category" class="custom-select custom-select-sm my-2" required>
                        <option value=""selected style="display: none">selectionez une catégorie</option>
                        @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                     <div class=" my-4"></div>
                    		<div class="form-group">
                                <label for="tags">écrivez vos tags ici <strong class="text-red-800">(5 maximum)</strong>(mots clef court de quelques lettres qui seront associer à cette resources )</label>
                                <input data-role="tagsinput" type="text" name="tags" id="tags" placeholder="psychologie,cerveau,humain,psy,cas,maladie etc......" required>
                            </div>
                     <div class=" my-4"></div>
                    <div class="custom-file" id="file">
                      <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr" onchange="return fileValidation() " required>
                      <label class="custom-file-label"  for="image">Sélectionner une image</label>
                        <div id="alert"></div>
                    </div>
                    <div id="imagePreview" class="col-lg-2"></div> 
                        
                      <label for="alt" class="label"> ajouter une description pour l'image (ALT)</label>
                      <input type="text" id="alt" name="alt" class="form-control my-4" value="{{ old('alt')}}" placeholder="description de l'image">
                    </div>

                      <div class=" my-6" id="file-type">

                    </div>

                    <div class=" my-4"></div>
                    <label for="meta">ajouter une meta description pour mieux referencer votre ressource <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ old('meta')}}" class="form-control my-2" placeholder="meta description" required>
           
                    <div class=" my-4"></div>
                        <label for="desc">décrivez votre ressources: <small class="text-danger">(max 255 caractères)</small></label>
                        <textarea type="text" id="desc" name="desc" class="form-control my-2"  placeholder="décrivez votre ressources" required></textarea>
                         <div class=" my-4"></div>

                        <label for="duration">ajouter une durée de lecture pour votre ressource <small class="text-danger">(uniquement en chiffres, en minutes et sans le mot minutes !)</small></label>
                         <input type="text" id="duration" name="duration" value="{{ old('duration')}}" class="form-control my-2" placeholder="ex: 3, 5, 10, 20 etc....." required>

                        <label for="private">ressource privée ?</label>
                        <input type="checkbox" name="private" id="private" class="form-checkbox" value="0">
                  
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

        $("select[id=category]").change(function(){
            if($(this).val() == 1){
                $('#file-type').html("").append('<p class=" text-center my-4">cette ressource est un PDF</p><div class="custom-file"><input type="file" class="custom-file-input my-2" name="pdf" id="pdf" lang="fr"><label class="custom-file-label" for="pdf">Sélectionner votre PDF </label></div>');
            }else if($(this).val() == 2){
                $('#file-type').html("").append('<p class=" text-center my-4">cette ressource est une vidéo</p><label for="link">ajouter votre lien vidéo externe ici:<small class="text-danger">(exemples: https://www.youtube.....) </small></label><input type="url" id="link" name="link" value="{{ old('link')}}" class="form-control my-2" placeholder="https://www.youtube.com/embed....">');
            }else if($(this).val() == 3){
                $('#file-type').html("").append('<p class=" text-center my-4">cette ressource est un podcast</p><label for="link">ajouter votre lien podcast externe ici:<small class="text-danger">(exemples: https://www.spotify.....) </small></label><input type="url" id="link" name="link" value="{{ old('link')}}" class="form-control my-2" placeholder="https://www.spotify.com/audio....">');
            }else{
                 $('#file-type').html("").append('<p class=" text-center my-4">cette ressource est un article</p><label for="link">ajouter votre lien vers cette article:<small class="text-danger">(exemples: https://www.article.....) </small></label><input type="url" id="link" name="link" value="{{ old('link')}}" class="form-control my-2" placeholder="https://www.article.com/....">');
            }

        });
    });


        $(document).ready(function () {
                $('#image').val("");
                $('#alert').html("");
            });
         function fileValidation() { 
            var fileInput =  document.getElementById('image'); 
              
            var filePath = fileInput.value; 
          var alert = document.getElementById('alert');
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
                
                alert.innerHTML = "";
                alert.innerHTML = '<span class="text-danger font-bold">ceci n"est pas une image valide seul les images extensions (gif, png, jpeg et jpg) sont autoriser merci !</span>';
                fileInput.value = ''; 
                 document.getElementById( 'imagePreview').innerHTML ="";
                return false; 
            }  
            else  
            { 
               alert.innerHTML = "";
                // Image preview 
                if (fileInput.files && fileInput.files[0]) { 
                    var reader = new FileReader(); 
                    reader.onload = function(e) { 
                        document.getElementById( 
                            'imagePreview').innerHTML =  
                            '<img src="' + e.target.result 
                            + '"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 

                
        }

</script>
@endsection
