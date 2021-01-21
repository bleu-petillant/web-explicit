@extends('layouts.admin')

@section('admin.resources.create')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">créer une nouvelle ressource</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center p-2" action="{{route('reference.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('includes.errors')

                  
                    <label for="title">Ajouter un titre pour votre ressource</label>
                    <input type="text" id="title" name="title" value="{{ old('title')}}" class="form-control my-2" placeholder="Titre de la ressource" required>

                    
                    <label for="category">Sélectioner une catégorie pour votre ressource</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2" required>
                        <option value=""selected style="display: none">Sélectioner une catégorie</option>
                        @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <label for="tags">Écrire vos tags ici <strong class="text-red-800">(5 maximum)</strong> <br>
                            Mot(s)-clé(s) courts de quelques lettres associé(s) à cette ressource</label>
                        <input data-role="tagsinput" type="text" name="tags" id="tags" placeholder="psychologie,cerveau,humain,psy,cas,maladie etc......" required>
                    </div>

                    <div class="custom-file" id="file">
                        <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr" onchange="return fileValidation() " required>
                        <label class="custom-file-label"  for="image">Sélectionner une image</label>
                        <div id="alert"></div>
                    </div>
                    <div id="imagePreview" class="col-lg-2"></div> 
                        
                    <label for="alt" class="label"> Ajouter une description pour l'image <small class="text-danger">(max 245 caractères)</small><label>
                    <input type="text" name="alt" id="imgDesc" class="form-control my-4" value="{{ old('alt')}}" placeholder="Description de l'image" maxlength="245">
                    <span id="compt_descr0" class="text-right">0 mot(s) | 245   caractère(s) restant(s)</span>
                    
                    <div class=" my-6" id="file-type">
                    </div>

                    <label for="meta">Ajouter une métadescription <small class="text-danger">(max 245 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ old('meta')}}" class="form-control my-2" placeholder="Métadescription" required maxlength="245">
                    <span id="compt_descr1" class="text-right">0 mot(s) | 245   caractère(s) restant(s)</span>
                    <br>
        

                    <label for="desc">Décrire votre ressource  <small class="text-danger">(max 245 caractères)</small></label>
                    <textarea type="text" id="desc2" name="desc" class="form-control my-2"  placeholder="Décrivez votre ressource" required maxlength="245"></textarea>
                    <span id="compt_descr2" class="text-right">0 mot(s) | 245   caractère(s) restant(s)</span>


                    <label for="duration">Ajouter une durée de lecture pour votre ressource <small class="text-danger">(Exemple : écrire "2:30" pour 2 minutes et 30 secondes de vidéo)</small></label>
                    <input type="text" id="duration" name="duration" value="{{ old('duration')}}" class="form-control my-2" placeholder="ex: 2:30, 5:00, 10:00 etc.....">

                    <label for="private">La ressource est-elle privée ?</label>
                    <input type="checkbox" name="private" id="private" class="form-checkbox" value="0">

                    <br>
                    <button class="btn btn-info  my-4" type="submit"><span class="fas fa-plus pr-2"></span>Créer cette ressource</button>
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


                $('#imgDesc').keyup(function() {
                    
                    var nombreCaractere0 = $(this).val().length;
                    var nombreCaractere0 = 245 - nombreCaractere0;
                    
                    var nombreMots0 = jQuery.trim($(this).val()).split(' ').length;
                    if($(this).val() === '') {
                        nombreMots = 0;
                    }
                    
                    var msg0 = ' ' + nombreMots0 + ' mot(s) | ' + nombreCaractere0 + ' Caractere(s) restant';
                    $('#compt_descr0').text(msg0);

                })  

                $('#meta').keyup(function() {
                    
                    var nombreCaractere1 = $(this).val().length;
                    var nombreCaractere1 = 245 - nombreCaractere1;
                    
                    var nombreMots1 = jQuery.trim($(this).val()).split(' ').length;
                    if($(this).val() === '') {
                        nombreMots = 0;
                    }
                    
                    var msg1 = ' ' + nombreMots1 + ' mot(s) | ' + nombreCaractere1 + ' Caractere(s) restant';
                    $('#compt_descr1').text(msg1);

                })  

                
                $('#desc2').keyup(function() {
                    
                    var nombreCaractere2 = $(this).val().length;
                    var nombreCaractere2 = 245 - nombreCaractere2;
                    
                    var nombreMots2 = jQuery.trim($(this).val()).split(' ').length;
                    if($(this).val() === '') {
                        nombreMots2 = 0;
                    }
                    
                    var msg2 = ' ' + nombreMots2 + ' mot(s) | ' + nombreCaractere2 + ' Caractere(s) restant';
                    $('#compt_descr2').text(msg2);


                }) 

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
                alert.innerHTML = '<span class="text-danger font-bold">Ceci n\'est pas une image valide. Seules les extensions (gif, png, jpeg et jpg) sont autorisées ici.</span>';
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
