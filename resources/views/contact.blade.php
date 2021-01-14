@extends('layouts.app')
@section('contact')


<section id="contact_title" class="p-5">
    <div class="grid grid-title-2 w-3/4 mx-auto">
        <div class="">
            <h1 class="text-white sm:text-3xl md:text-6xl font-bold uppercase leading-none">Contact</h1>
        </div>
        <div class="">
            <p class="text-white my-4">Une question ? Une recommandation ?</p>
        </div>        
    </div> 
</section>


<section class="row flex-column-reverse flex-lg-row py-24" >
    <div class=" col-lg-5 ">
        <img src="img/contact.png" class="w-full"  alt="">
    </div>
    
    <div class=" col-lg-7" >
        <form id="form-contact" class=" mx-auto" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group form-contact ml-8" >
                <div class=" ">
                    <!-- <label for="email" class="text-contact col-form-label pr-2">Adresse mail</label> -->
                    <div class="md-form mt-0">
                        <input type="email" id="email" name="email" class=" input-contact" placeholder="Adresse email">
                    </div>
                </div>
                <div class=" ">
                    <!-- <label for="sujet" class="text-contact col-form-label pr-2">Objet</label> -->
                    <div class="md-form mt-8 ">
                        <input type="text" id="sujet" name="sujet" class=" input-contact" placeholder="Objet">
                    </div>
                </div>
                <div class="">
                    <!-- <label for="message" class="text-contact col-form-label pr-2">alors, </label> -->
                    <div class="md-form mt-8 ">
                        <textarea id="message" name="message" class="input-message-contact" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="contact-submit mt-4">
                    <button id="submit" type="submit" class=""> <p class="text-center">envoyer</p> </button>
                </div>
                
            </div>
        </form>   
    </div>

</section>


        <script src="{{asset('js/contact.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@endsection