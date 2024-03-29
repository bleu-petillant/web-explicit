@extends('layouts.admin')

@section('admin.resources.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reference.index') }}">liste des ressources</a></li>
                        <li class="breadcrumb-item active">modifier la ressource <span class="text-danger font-perso font-italic">"{{ $reference->title }}"</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('reference.update',$reference->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <label for="category">Modifier la catégorie (si besoin)</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">selectionez une catégorie</option>
                        @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" @if($reference->category_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                        @endforeach
                    </select>

                    
                    @if ($reference->pdf  != 'pdf')
                    <p class="text-center my-4 text-red-600">cette ressource est  un pdf interne, les liens externes ne sont pas autoriser dans ce cas</p>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input my-2" name="pdf" id="pdf" lang="fr">
                        <label class="custom-file-label" for="pdf">Modifier votre PDF </label>
                    </div>
                        @else
                        <label for="link">Ajouter votre lien externe<small class="text-danger"> (exemples: https://www.monlien.fr) sauf pour les pdf</small></label>
                        <input type="url" id="link" name="link" value="{{ $reference->link }}" class="form-control my-2" placeholder="{{ $reference->link }}">
                    @endif


                    <div class="my-8"></div>
                    <div class="form-group mb-4">
                        @if ($tags->count() > 0 )
                         <p class="text-center font-bold my-4">modifier les tags: (mots clef cours de quelques lettres)</p>
                        @foreach ($tags as $tag)
                         <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->tag_slug }}" checked>
                            <label class="custom-control-label" for="tag{{ $tag->id }}">{{ $tag->tag_slug }}</label>
                        </div> 
                        @endforeach 
                        @else
                        <p class="text-center text-red-500 my-3">vous n'avez pas encore créé de tags pour cette ressource...</p> 
                            <div class="form-group">
                                <label for="tags">Créer vos tags ici <strong class="text-red-800">(5 maximum)</strong></label>
                                <input data-role="tagsinput" type="text" name="tags" id="tags" >
                            </div>
                         @endif
                    </div>
                    <div class="mt-4">
                        <p class="text-center font-bold">Modifier votre image</p>
                    </div>
                    <div class="d-flex justify-content-center align-content-center my-8">
                        <div class="col-6 my-4">
                            <div class="custom-file" id="file">
                                <input type="file" class="custom-file-input" name="image" id="image" lang="fr"  onchange="return fileValidation() ">
                                <label class="custom-file-label" for="image">Sélectionner une nouvelle image</label>
                                <div id="alert"></div>
                            </div>
                        </div>
                        <div class="col-6 flex">
                            <div id="imagePreview" class="col-lg-2">
                                 <img src="{{ asset($reference->image) }}" class="img-fluid" alt="">
                            </div> 
                        </div>
                     </div>
          

                    
                    <label for="title">Modifier le titre</label>
                    <input type="text" id="title" name="title" value="{{ $reference->title }}" class="form-control my-2" placeholder="">
                    

                    <label for="meta">Modifier la métadescription <small class="text-danger">(max 245 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ $reference->meta }}" class="form-control my-2" placeholder="Métadescription" maxlength="245"> 
                    <span id="compt_descr1" class="text-right">0 mot(s) | 245   caractère(s) restant(s)</span>
                    <br>

                     
                    <label for="alt" class="label">Modifier la description de l'image <small class="text-danger">(max 245 caractères)</small></label>
                    <input type="text" id="imgDesc" name="alt" value="{{ $reference->alt }}" class="form-control my-2" placeholder="{{ $reference->alt }}" maxlength="245">
                    <span id="compt_descr0" class="text-right">0 mot(s) | 245   caractère(s) restant(s)</span>
                    <br>
                    
                    <label for="desc2">Modifier la description de votre ressource</label>
                    <textarea id="desc" name="desc" class="form-control my-2 " maxlength="245" >{{ $reference->desc }}</textarea>
                    <span id="compt_descr2" class="text-right">0 mot(s) | 245   caractère(s) restant(s)</span>
                    <br>

                    <div>
                        <label for="private">La ressource est-elle privée ?</label>
                        <input type="checkbox" name="private" id="private" class="form-checkbox" value="{{ $reference->private }}" @if($reference->private == 1) checked @endif>
                    </div>
                     <label for="duration">Ajouter une durée de lecture pour votre ressource <br>
                        <small class="text-danger">(Écrire 2:30 pour 2 minutes et 30 secondes de vidéo)</small></label>
                         <input type="text" id="duration" name="duration" value="{{ old('duration')}}" class="form-control my-2" placeholder="ex: 2:30, 5:00, 10:00 etc.">
                        <button class="btn btn-success " type="submit"><span class="fas fa-pen pr-2"></span>Modifier la ressource</button>
                    </form>
            </div>
        </div>
    </div>

<script>
    $(function () {
        let private= $("input[type=checkbox]").val();
        if(private == 1)
        {
             $("input[type=checkbox]:checked");
        }
        $("input[type=checkbox]").change(function(){
            if($(this).is(':checked')){
                $(this).val(1);
            }else{
                $(this).val(0);
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

                $('#desc').keyup(function() {
                    
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
               document.getElementById( 'imagePreview').innerHTML ="";
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
