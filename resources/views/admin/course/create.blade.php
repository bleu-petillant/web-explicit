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
                <form class="text-center p-2" action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p class="h4 mb-4">Créer un nouveau cours</p>
                    <p>
                        
                    </p>
                    @include('includes.errors')
                    {{-- <label for="category">Sélectionez une catégorie</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">selectionez une catégorie</option>
                        @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select> --}}
                    <hr class="hr-light">
                     <div class="form-group">
                        <label class="text-center" for="primary_ressource">Sélectionez la première ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="primary_ressource" required>
                            <option value=""selected style="display: none">Sélectionez la resource</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label class="text-center" for="secondary_ressource">Sélectionez la deuxième ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="secondary_ressource" required>
                            <option value=""selected style="display: none">Sélectionez la resource</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <hr class="hr-light my-2">
                    <div class="custom-file" id="file">
                      <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr" onchange="return fileValidation() " required>
                      <label class="custom-file-label"  for="image">Sélectionner une image</label>
                        <div id="alert"></div>
                    </div>
                    <div id="imagePreview" class="col-lg-2"></div> 
                    
                    <label for="alt" class="label"> Ajouter une description pour l'image <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="desc3" name="alt" value="{{ old('alt')}}" class="form-control my-2" placeholder="description de l'image" required maxlength="255"> 
                    <span id="compt_descr3" class="text-right">0 mots | 255 caractère(s) restant(s)</span>

                       
                    <label for="title">Ajouter un titre</label>
                    <input type="text" id="title" name="title" value="{{ old('title')}}" class="form-control my-2" placeholder="titre du cours" required>

               
                    <label for="meta">Ajouter une meta description <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ old('title')}}" class="form-control my-2" placeholder="meta description" maxlength="255" required>
                    <span id="compt_descr1" class="text-right">0 mots | 255 caractère(s) restant(s)</span>
                        
                    <hr class="hr-light">
                    <label for="desc2">Décrivez votre cours <small class="text-danger">(max 255 caractères)</small></label>
                    <textarea type="text" id="desc2" name="desc2" class="form-control editor" placeholder="décrivez votre cours ici...." required maxlength="255">{{ old('desc')}}</textarea>
                    <span id="compt_descr2" class="text-right">0 mots | 255 caractère(s) restant(s)</span>
                    <br>
                    @if($references->count() > 1)
                    <button id="sendButton" class="btn btn-success my-3" type="submit" ><span class="fas fa-plus pr-2"></span>publiez votre cours</button>
                    @else
                    <h3>pas assez de ressources pour créer votre premiere formation, veuillez créer des ressources en premier</h3>
                    @endif
                    
                </form>
            </div>
        </div>
    </div>
    <script>

        $(document).ready(function () {
                $('#image').val("");
                $('#alert').html("");

                $('#desc3').keyup(function() {
                    
                    var nombreCaractere0 = $(this).val().length;
                    var nombreCaractere0 = 255 - nombreCaractere0;
                    
                    var nombreMots0 = jQuery.trim($(this).val()).split(' ').length;
                    if($(this).val() === '') {
                        nombreMots = 0;
                        console.log(' nombre 0');
                    }
                    
                    var msg0 = ' ' + nombreMots0 + ' mot(s) | ' + nombreCaractere0 + ' Caractere(s) restant';
                    $('#compt_descr3').text(msg0);

                });  

                $('#meta').keyup(function() {
                    
                    var nombreCaractere1 = $(this).val().length;
                    var nombreCaractere1 = 255 - nombreCaractere1;
                    
                    var nombreMots1 = jQuery.trim($(this).val()).split(' ').length;
                    if($(this).val() === '') {
                        nombreMots = 0;
                    }
                    
                    var msg1 = ' ' + nombreMots1 + ' mot(s) | ' + nombreCaractere1 + ' Caractere(s) restant';
                    $('#compt_descr1').text(msg1);

                });  

                
                $('#desc2').keyup(function() {
                    
                    var nombreCaractere2 = $(this).val().length;
                    var nombreCaractere2 = 255 - nombreCaractere2;
                    
                    var nombreMots2 = jQuery.trim($(this).val()).split(' ').length;
                    if($(this).val() === '') {
                        nombreMots2 = 0;
                    }
                    
                    var msg2 = ' ' + nombreMots2 + ' mot(s) | ' + nombreCaractere2 + ' Caractere(s) restant';
                    $('#compt_descr2').text(msg2);


                }); 

                
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
