@extends('layouts.admin')

@section('admin.questions.create')

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
                <form class="text-center" action="{{route('question.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p class="h4 mb-4">créer une nouvelle questions</p>
                    @include('includes.errors')
                    <hr class="hr-light">
                     <div class="form-group">
                         @if($courses->count() > 0)
                        <label class="text-center" for="course">selectionez une formation</label>
                        <select  name="course" id="course" class="custom-select custom-select-sm my-2">
                            <option value=""selected style="display: none">selectionez la formation</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                        </select>
                        @else
                        <h3>vous n'avez pas encore de formations à associer votre question , veuillez créer en premier votre formation</h3>
                        @endif
                    </div> 
                    <div class="my-2"></div>
                    <div class="custom-file" id="file">
                      <input type="file" class="custom-file-input my-2" name="video" id="video" lang="fr" onchange="return fileValidation() ">
                      <label class="custom-file-label" for="video">Sélectionner la video</label>
                      <div id="alert"></div>
                    </div>
                    <div id="imagePreview" class="col-lg-4">
                     </div> 
                     <div class="form-group">
                    <label for="content" class="control-label">votre question:</label>
                    <input type="text" id="content" name="content" class="form-control" placeholder="écrivez votre question">
                </div>
                <div class="form-group">
                    <label for="reponse1" class="control-label">reponse possible 1</label>
                    <input type="text" id="reponse1" name="reponse[]" class="form-control" placeholder="réponse 1....">
                    <div class="my-2"></div>
                    <select name="correct[]" id="correct" class="form-select">
                         <option value=""selected style="display: none">réponse correct ?</option>
                        <option value="1">vraie</option>
                        <option value="0">faux</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reponse2" class="control-label">reponse possible 2</label>
                    <input type="text" id="reponse2" name="reponse[]" class="form-control" placeholder="réponse 2....">
                    <div class="my-2"></div>
                    <select name="correct[]" id="correct" class="form-select">
                         <option value=""selected style="display: none">réponse correct ?</option>
                        <option value="1">vraie</option>
                        <option value="0">faux</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reponse3" class="control-label">reponse possible 3</label>
                    <input type="text" id="reponse3" name="reponse[]" class="form-control" placeholder="réponse 3....">
                     <div class="my-2"></div>
                    <select name="correct[]" id="correct" class="form-select">
                         <option value=""selected style="display: none">réponse correct ?</option>
                        <option value="1">vraie</option>
                        <option value="0">faux</option>
                    </select>
                </div>
                 <div class="form-group">
                    <label for="reponse4" class="control-label">reponse possible 4</label>
                    <input type="text" id="reponse4" name="reponse[]" class="form-control" placeholder="réponse 4....">
                <div class="my-2"></div>
                    <select name="correct[]" id="correct" class="form-select">
                         <option value=""selected style="display: none">réponse correct ?</option>
                        <option value="1">vraie</option>
                        <option value="0">faux</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reponse5" class="control-label">reponse possible 5</label>
                    <input type="text" id="reponse5" name="reponse[]" class="form-control" placeholder="réponse 5....">
                <div class="my-2"></div>
                    <select name="correct[]" id="correct" class="form-select">
                         <option value=""selected style="display: none">réponse correct ?</option>
                        <option value="1">vraie</option>
                        <option value="0">faux</option>
                    </select>
                </div>

                <div class="form-group">
                        <label class="text-center" for="ref_1">selectionez une ressources d'aide pour cette question</label>
                        <select  name="ref[]" id="ref_1" class="custom-select custom-select-sm my-2" required>
                            <option value=""selected style="display: none">selectionez une ressource</option>
                        @foreach ($references as $ref)
                            <option value="{{ $ref->id }}">{{ $ref->title }}</option>
                        @endforeach
                        </select>
                </div> 
                <div class="my-2"></div>
                <div class="form-group">
                        <label class="text-center" for="ref-2">selectionez une ressource d'aide pour cette question</label>
                        <select  name="ref[]" id="ref-2" class="custom-select custom-select-sm my-2">
                            <option value=""selected style="display: none">selectionez une resoource</option>
                        @foreach ($references as $ref)
                            <option value="{{ $ref->id }}">{{ $ref->title }}</option>
                        @endforeach
                        </select>
                </div> 

                <div class="form-group">
                    <label for="indice" class="control-label">indices pour aider les éléves :</label>
                    <textarea type="text" id="indice" name="indice" class="form-control" placeholder="écrivez votre indice"></textarea>
                </div>
                    <button class="btn btn-success my-3" type="submit"><span class="fas fa-plus pr-2"></span>publiez votre questions</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            let courseSelect = $('#course');
            let positionSelect = $('#position');
            $('#video').val("");
            $('#alert').html("");
            let posArray = [];
             for (let i = 1; i  < 11;  i++) {

            positionSelect.append(' <option value="'+i+'">'+i+'</option>');                  
                                
         }

        //      courseSelect.on('change', function () {
        //          let course_id = $(this).val();
        //          $.ajaxSetup({
        //              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        //          }),
        //          $.ajax({
        //          url: '/get_question_position',
        //          type: "POST",
        //          data:{
        //              course_id:course_id,
        //           },
        //              success: function (response) {
                         
        //                  if(response.status == 'success')
        //                  {
                            
        //                      positionSelect.html("");
        //                      posArray = [];
        //                      for (let i = 0; i < response.length; i++) {
        //                          console.log(response[i]);
        //                         let pos = response[i].question_position;
        //                         posArray.push(pos);
                                 
        //                      }
                            
                             
        //                     console.log(posArray);
        //                      let lastPos = posArray.length -1;
                            
        //                      if(posArray.length < 2){
        //                          lastPos = 2;
        //                      }
                            
                    
        //                     if(pos.length > 0)
        //                     {
        //                         for (let i = lastPos; i  < 11;  i++) {

        //                             positionSelect.append(' <option value="'+i+'">'+i+'</option>');                  
                                
        //                         }

        //                     }else{

        //                         for (let i = 1; i  < 11;  i++) {

        //                             positionSelect.append(' <option value="'+i+'">'+i+'</option>');                  
                                
        //                         }
        //                     }

        //                  }else
        //                  {
 
        //                  }
        //          }
        //      });
        //  });

    });

         function fileValidation() { 
            var fileInput =  document.getElementById('video'); 
              
            var filePath = fileInput.value; 
          var alert = document.getElementById('alert');
            // Allowing file type 
            var allowedExtensions =  
                    /(\.mp4)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
                
                alert.innerHTML = "";
                alert.innerHTML = '<span class="text-danger font-bold">ceci n"est pas une vidéo valide seul les vidéo extensions (mp4) sont autoriser merci !</span>';
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
                            '<video controls playsinline width="800" height"800"'+ ' src="' + e.target.result +'">'+'</video>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 

                
        }
    </script>
    </script>
@endsection
