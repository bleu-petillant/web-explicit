@extends('layouts.admin')

@section('admin.course.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('course.index') }}">liste des formations</a></li>
                        <li class="breadcrumb-item active">modifier la formation <span class="text-danger font-perso font-italic">"{{ $course->slug }}"</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('course.update',$course->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                     <div class="form-group">
                        <label class="text-center" for="primary_ressource">Modifier la première ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="primary_ressource">
                            <option value="{{ $first->id}}"selected>{{ $first->slug}}</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label class="text-center" for="secondary_ressource">Modifier la deuxième ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="secondary_ressource">
                            <option value="{{ $second->id}}"selected>{{ $second->slug}}</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 

                    <hr class="hr-light">

                    <div class="d-flex justify-content-around align-content-center">
                        <div class="col-6">
                            <div class="custom-file" id="file">
                                <input type="file" class="custom-file-input" name="image" id="image" lang="fr"  onchange="return fileValidation() ">
                                <label class="custom-file-label" for="image">Sélectionner une nouvelle image</label>
                                <div id="alert"></div>
                            </div>
                        </div>
                        <div class="col-6 flex">
                            <div style="max-width: 150px;max-height:150px;overflow:hidden">
                                <img src="{{ asset($course->image) }}" class="img-fluid" alt="">
                            </div>
                            <div id="imagePreview" class="col-lg-2"></div> 
                        </div>
                    </div>

                    <hr class="hr-light">
                    <label for="alt" class="label"> Ajouter une description pour l'image</label>
                    <input type="text" id="imgDesc" name="alt" value="{{ $course->alt}}" class="form-control my-2" placeholder="description de l'image">
                    <span id="compt_descr0" class="text-right">0 mot(s) | 255   caractère(s) restant(s)</span>
                    <div class="my-2"></div>

                    <label for="title">Modifier le titre de la formation</label>
                    <input type="text" id="title" name="title" value="{{ $course->title }}" class="form-control my-2" placeholder="">

                    <label for="meta">Modifier votre métadescription <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ $course->meta }}" class="form-control my-2" placeholder="Métadescription" required>
                    <span id="compt_descr1" class="text-right">0 mot(s) | 255   caractère(s) restant(s)</span>


                    <hr class="hr-light">
                    <label for="content">Modifier la description de cette formation</label>
                    <textarea type="text" id="desc" name="desc" class="form-control my-2 editor" placeholder="{{ $course->desc }}">{{ $course->desc }}</textarea>
                    <span id="compt_descr2" class="text-right">0 mot(s) | 255   caractère(s) restant(s)</span>

                        <button class="btn btn-success btn-block" type="submit"><span class="fas fa-pen pr-2"></span>Modifier la formation</button>
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

                
                $('#desc').keyup(function() {
                    
                    var nombreCaractere2 = $(this).val().length;
                    var nombreCaractere2 = 255 - nombreCaractere2;
                    
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
