@extends('layouts.admin')

@section('admin.usage.create')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                        <li class="breadcrumb-item active">créer un nouveau cas d 'usage</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center p-2" action="{{route('usage.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('includes.errors')

                  
                    <label for="title">Ajouter un titre pour votre cas d'usage.</label>
                    <input type="text" id="title" name="title" value="{{ old('title')}}" class="form-control my-2" placeholder="titre du cas d'usage..." required> <br>

                     <div class=" my-4"></div>
                     <div class="custom-file" id="file">
                      <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr" onchange="return fileValidation() " required>
                      <label class="custom-file-label"  for="image">Sélectionner une image</label>
                        <div id="alert"></div>
                    </div>
                    <div id="imagePreview" class="col-lg-2"></div> <br> 
                        
                    <label for="alt" class="label"> Ajouter une description pour l'image <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="imgDesc" name="alt" class="form-control " value="{{ old('alt')}}" placeholder="description de l'image" required maxlength="255">
                    <span id="compt_descr0" class="text-right">0 mots | 255   caractère(s) restant(s)</span>
                    <br> <br>
                    
                    <label for="link">votre lien vers la vidéo heberger (ex: youtube,viméo,dailymotion etc....):<small class="text-danger">(exemples:https://www.youtube.com/embed/_RDtBJPOsV8) </small></label>
                    <input type="url" id="link" name="link" value="{{ old('link')}}" class="form-control my-2" placeholder="https://www.votrelien.com">
                        <br>

                    <label for="meta">Ajouter une meta description pour mieux referencer votre cas d'usage <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ old('meta')}}" class="form-control my-2" placeholder="meta description" required maxlength="255">
                    <span id="compt_descr1" class="text-right">0 mots | 255   caractère(s) restant(s)</span>
                    <br> <br>
 
                    <label for="desc">Articles sur votre cas d'usage: </label>
                    <textarea type="text" id="desc" name="desc" class="form-control my-2"  placeholder="décrivez votre cas d'usage" required></textarea>

                     <div class=" my-4"></div>
                    <button class="btn btn-info  my-4" type="submit"><span class="fas fa-plus pr-2"></span>Créez ce cas d' usage</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
                $('#image').val("");
                $('#alert').html("");

                $('#imgDesc').keyup(function() {
                    
                    var nombreCaractere0 = $(this).val().length;
                    var nombreCaractere0 = 255 - nombreCaractere0;
                    
                    var nombreMots0 = jQuery.trim($(this).val()).split(' ').length;
                    if($(this).val() === '') {
                        nombreMots = 0;
                    }
                    
                    var msg0 = ' ' + nombreMots0 + ' mot(s) | ' + nombreCaractere0 + ' Caractere(s) restant';
                    $('#compt_descr0').text(msg0);

                })  

                $('#meta').keyup(function() {
                    
                    var nombreCaractere1 = $(this).val().length;
                    var nombreCaractere1 = 255 - nombreCaractere1;
                    
                    var nombreMots1 = jQuery.trim($(this).val()).split(' ').length;
                    if($(this).val() === '') {
                        nombreMots = 0;
                    }
                    
                    var msg1 = ' ' + nombreMots1 + ' mot(s) | ' + nombreCaractere1 + ' Caractere(s) restant';
                    $('#compt_descr1').text(msg1);

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
