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
                        <label class="text-center" for="course">selectionez une formation</label>
                        <select  name="course" id="course" class="custom-select custom-select-sm my-2">
                            <option value=""selected style="display: none">selectionez la formation</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <div>
                        <label for="position">numèro de la question</label>
                        <select name="position" id="position"  class="custom-select custom-select-sm my-2">
                            <option value=""selected style="display: none">selectionez le numèro de la question</option>
                        </select>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input my-2" name="video" id="video" lang="fr">
                      <label class="custom-file-label" for="video">Sélectionner la video</label>
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
            let posArray = [];
            for (let i = 1; i  < 11;  i++) {
                    //let pos = response[i].question_position;
                    //posArray.push(pos);
                positionSelect.append(' <option value="'+i+'">'+i+'</option>');
                               
                                
            }
        //     courseSelect.on('change', function () {
        //         let course_id = $(this).val();
        //         $.ajaxSetup({
        //             headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        //         }),
        //         $.ajax({
        //         url: '/get_question_position',
        //         type: "POST",
        //         data:{
        //             course_id:course_id,
        //          },
        //             success: function (response) {
        //                 if(response)
        //                 {
        //                      positionSelect.html("");
        //                      posArray = [];
              
                           
        //                     for (let i = 1; i  < 11;  i++) {
        //                         //let pos = response[i].question_position;
        //                         //posArray.push(pos);
        //                        positionSelect.append(' <option value="'+question_possible+'">'+question_possible+'</option>');
                               
                                
        //                     }
        //                    //console.log(posArray);

        //                 }else
        //                 {
        //                     'error server'
        //                 }
        //         }
        //     });
        // });
    });
    </script>
@endsection
