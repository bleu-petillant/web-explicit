$(document).ready(function () {
    let mailregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; //pattern email valide
    let submit_button = $('#submit');
    let mail = $('#form-contact');
    let email = $('#email').val();
    let sujet = $('#sujet').val();
    let message = $('#message').val();
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': _token }
    })
    $.validator.addMethod("mailregex",function(value,element){

        return this.optional(element) || mailregex.test(value);
    }, "Veuillez rentrer une adresse email valide"),

submit_button.on('click',function(e){
    mail.validate({
        wrapper: "div", // balise <div></div> qui contient le span erreur
        errorElement: "span",// element <span></span> qui contient la class error à styler
            rules: {
                email: {
                    required: true,
                    email: true,
                    mailregex:true
                },
                message: {
                    required: true,

                },
            },
            messages: {
                email: {
                    required: "quel est votre email ?",
                    email: "cette adresse mail n'est pas valide !",

                },
                message: {
                    required: "écrivez votre message",

                },
            },
            submitHandler: function (mail) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN':_token
                    }
                });
                $.ajax({
                    url: 'message',
                    type: "POST",
                    data: {
                        email:email,
                        sujet:sujet,
                        message:message,
                    },
                    success: function (response) {
                        if(response)
                        {
                             Swal.fire({
                            icon: 'success',
                            title: 'Merci, ',
                            text: 'votre message est envoyez avec succés !',
                            footer: '',
                            showCloseButton: true,
                            })
                        mail.reset();
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'oups !, ',
                            text: 'il y à eu une erreur dans le formulaire, votre message n"as pas pu être envoyez',
                            footer: '',
                            showCloseButton: true,
                            })
                        }

                    }
                });
                return false;
            }
    })
    })

});