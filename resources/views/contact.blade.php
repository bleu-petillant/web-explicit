@extends('layouts.app')
@section('contact')
<form id="form-contact" action="" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-group row form-contact" >
        <div class="col-md-12 d-flex">
            <label for="email" class="text-contact col-form-label pr-2">Adresse mail</label>
            <div class="md-form mt-0">
                <input type="email" id="email" name="email" class="form-control" placeholder="monemail@mail.com">
            </div>
        </div>
        <div class="col-md-12 d-flex">
            <label for="sujet" class="text-contact col-form-label pr-2">Objet</label>
            <div class="md-form mt-0 col-md-6">
                <input type="text" id="sujet" name="sujet" class="form-control" placeholder="j'aimerais vous parler de.....">
            </div>
        </div>
        <div class="col-md-12 d-flex">
            <label for="message" class="text-contact col-form-label pr-2">alors, </label>
            <div class="md-form mt-0 col-md-8">
                <textarea id="message" name="message" class="form-control" placeholder="voici mon message......."></textarea>
            </div>
        </div>
        <button id="submit" type="submit" class="btn">envoyer</button>
    </div>
</form>
         <script src="{{asset('js/contact.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@endsection