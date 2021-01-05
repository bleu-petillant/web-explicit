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
                <form class="text-center" action="{{route('usage.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('includes.errors')

                  
                    <label for="title">Ajouter un titre pour votre cas d'usage.</label>
                    <input type="text" id="title" name="title" value="{{ old('title')}}" class="form-control my-2" placeholder="titre du cas d'usage..." required>

                     <div class=" my-4"></div>
                     <div class="custom-file" id="file">
                      <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr" onchange="return fileValidation() " required>
                      <label class="custom-file-label"  for="image">Sélectionner une image</label>
                        <div id="alert"></div>
                    </div>
                    <div id="imagePreview" class="col-lg-2"></div> 
                    <div class="my-2"></div>
                        
                      <label for="alt" class="label"> ajouter une description pour l'image (ALT)</label>
                      <input type="text" id="alt" name="alt" class="form-control my-4" value="{{ old('alt')}}" placeholder="description de l'image" required>
                   
                    
                     <div class=" my-4"></div>
                     <p class=" text-center my-4">votre lien vers la vidéo heberger (ex: youtube,viméo,dailymotion etc....):</p>
                    <label for="link">ajouter votre lien  ici:<small class="text-danger">(exemples:https://www.youtube.com/embed/_RDtBJPOsV8) </small></label>
                    <input type="url" id="link" name="link" value="{{ old('link')}}" class="form-control my-2" placeholder="https://www.votrelien.com">

                    <div class=" my-4"></div>
                    <label for="meta">ajouter une meta description pour mieux referencer votre cas d'usage <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ old('meta')}}" class="form-control my-2" placeholder="meta description" required>
           
                    <div class=" my-4"></div>
                    <label for="desc">articles sur votre cas d'usage: </label>
                    <textarea type="text" id="desc" name="desc" class="form-control my-2"  placeholder="décrivez votre cas d'usage" required></textarea>

                     <div class=" my-4"></div>
                    <button class="btn btn-info  my-4" type="submit"><span class="fas fa-plus pr-2"></span>créez ce cas d' usage</button>
                </form>
            </div>
        </div>
    </div>

    <script>
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
