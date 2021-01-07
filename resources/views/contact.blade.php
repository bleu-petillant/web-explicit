@extends('layouts.app')
@section('contact')


<section id="contact_title" class="p-5">
    <div class="grid grid-title-2 w-3/4 mx-auto">
        <div class="">
            <h1 class="text-white text-6xl font-bold uppercase leading-none">Contact</h1>
        </div>
        <div class="">
            <p class="text-white my-4">Une question ? Une recommandation ?</p>
        </div>        
    </div> 
</section>


<section class="flex my-32 ">
    <img src="img/contact.png" class="w-1/3" alt="">
    <form id="form-contact" class="w-2/3" action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group row form-contact ml-8" >
            <div class="col-md-12 d-flex">
                <!-- <label for="email" class="text-contact col-form-label pr-2">Adresse mail</label> -->
                <div class="md-form mt-0">
                    <input type="email" id="email" name="email" class=" input-contact" placeholder="Adresse email">
                </div>
            </div>
            <div class="col-md-12 d-flex">
                <!-- <label for="sujet" class="text-contact col-form-label pr-2">Objet</label> -->
                <div class="md-form mt-8 col-md-6">
                    <input type="text" id="sujet" name="sujet" class=" input-contact" placeholder="Objet">
                </div>
            </div>
            <div class="col-md-12 d-flex">
                <!-- <label for="message" class="text-contact col-form-label pr-2">alors, </label> -->
                <div class="md-form mt-8 col-md-8">
                    <textarea id="message" name="message" class="input-message-contact" placeholder="Message"></textarea>
                </div>
            </div>
            <div class="contact-submit mt-4">
                <button id="submit" type="submit" class="btn "> <p class="text-center">envoyer</p> </button>
            </div>
            
        </div>
    </form>   
</section>


        <script src="{{asset('js/contact.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@endsection