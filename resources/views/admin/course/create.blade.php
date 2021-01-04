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
                <form class="text-center" action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p class="h4 mb-4">créer un nouveau cours</p>
                    <p>
                        
                    </p>
                    @include('includes.errors')
                    {{-- <label for="category">selectionez une catégorie</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">selectionez une catégorie</option>
                        @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select> --}}
                    <hr class="hr-light">
                     <div class="form-group">
                        <label class="text-center" for="primary_ressource">selectionez la première ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="primary_ressource">
                            <option value=""selected style="display: none">selectionez la resource</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label class="text-center" for="secondary_ressource">selectionez la deuxième ressource</label>
                        <select class="custom-select custom-select-sm my-2" name="ref[]" id="secondary_ressource">
                            <option value=""selected style="display: none">selectionez la resource</option>
                        @foreach ($references as $reference)
                            <option value="{{ $reference->id }}">{{ $reference->slug }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <hr class="hr-light my-2">
                    <div class="custom-file" id="file">
                      <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr" onchange="return fileValidation() ">
                      <label class="custom-file-label"  for="image">Sélectionner une image</label>
                        <div id="alert"></div>
                    </div>
                    <div id="imagePreview" class="col-lg-2"></div> 
                    <div class="my-2"></div>
                    <label for="alt" class="label"> ajouter une description pour l'image (ALT)</label>
                      <input type="text" id="alt" name="alt" value="{{ old('alt')}}" class="form-control my-2" placeholder="description de l'image" required>
                       <div class="my-2"></div>
                    <label for="title">ajouter un titre</label>
                    <input type="text" id="title" name="title" value="{{ old('title')}}" class="form-control my-2" placeholder="titre du cours" required>
               <div class="my-2"></div>
                    <label for="meta">ajouter une meta description <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ old('title')}}" class="form-control my-2" placeholder="meta description" required>

                    <hr class="hr-light">
                    <label for="desc">décrivez votre cours</label>
                    <textarea type="text" id="desc" name="desc" class="form-control my-5 editor" placeholder="décrivez votre cours ici....">{{ old('desc')}}</textarea>
                    @if($references->count() > 1)
                    <button class="btn btn-success my-3" type="submit"><span class="fas fa-plus pr-2"></span>publiez votre cours</button>
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
