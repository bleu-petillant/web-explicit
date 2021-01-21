@extends('layouts.admin')

@section('admin.usage.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('usage.index') }}">liste des cas d'usage</a></li>
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

                        <label for="link">Modifier votre lien externe<small class="text-danger">(exemples: https://www.youtube.fr) </small></label>
                        <input type="url" id="link" name="link" value="{{ $usage->link }}" class="form-control my-2" placeholder="{{ $usage->link }}">
                 
                    <div class="mt-4">
                        <p class="text-center font-bold">Modifier votre image si besoin:</p>
                    </div>

                    <div class="my-8">
                        <div class="custom-file" id="file">
                            <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr" onchange="return fileValidation() ">
                            <label class="custom-file-label"  for="image">Sélectionner une nouvelle image si besoin</label>
                            <div id="alert"></div>
                         </div>
                    <div id="imagePreview" class="col-lg-2">
                        <img src="{{asset($usage->image)}}" alt="">
                    </div> 
                    </div>
                    <div class="my-2"></div>

                     <div class="my-4">
                      <label for="alt" class="label"> Modifier la description de l'image <small class="text-danger">(max 255 caractères)</small></label>
                      <input type="text" id="imgDesc" name="alt" value="{{ $usage->alt }}" class="form-control my-2" placeholder="{{ $usage->alt }}"  maxlength="255">
                      <span id="compt_descr0" class="text-right">0 mot(s) | 255   caractère(s) restant(s)</span>
                    </div>

                    <div class="my-4"></div>
                    <label for="title">Modifier le titre</label>
                    <input type="text" id="title" name="title" value="{{ $usage->title }}" class="form-control my-2" placeholder="">
                    <div class="my-2"></div>
                    <label for="meta">Modifier la métadescription (brève description pour les moteurs de recherche)<small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ $usage->meta }}" class="form-control my-2" placeholder="métadescription">
                    <span id="compt_descr1" class="text-right">0 mot(s) | 255   caractère(s) restant(s)</span>


                    <div class="my-4">
                    <label for="desc">Modifier la description du cas d'usage</label>
                    <input id="desc" name="desc" class="form-control my-2 " value="{{ $usage->desc }}" placeholder="{{ $usage->desc }}" >
                        <button class="btn btn-success " type="submit"><span class="fas fa-pen pr-2"></span>Modifier ce cas d'usage</button>
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
                alert.innerHTML = '<span class="text-danger font-bold">Ceci n\'est pas une image valide. Seules les extensions (gif, png, jpeg et jpg) sont autorisées ici.</span>';
                fileInput.value = ''; 
                 document.getElementById( 'imagePreview').innerHTML ="";
                return false; 
            }  
            else  
            { 
                document.getElementById( 'imagePreview').innerHTML ="";
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
