class CheckResponse
{
    constructor()
    {
       
        this.checkTheReponse();

    }

    checkTheReponse()
    {
         let valide = $('#valide');
         let reponses = [];
        $("input[type=checkbox]").change(function(){
            if($(this).is(':checked')){
               let reponse = $(this).val();
               reponses.push(reponse);

            }else{
    
                var x = reponses.indexOf($(this).val());
                reponses.splice(x,1);

            }
            valide.toggle( $(".form-checkbox:checked").length > 0 );
        });

         $("input[type=radio]").change(function(){
            
            valide.toggle( $(".form-radio:checked").length > 0 );
        });
         
        $('#check').on('click',function(e){
             e.preventDefault();
             let question_id = $('#question_id').val();
             $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            }),
            $.ajax({
                url: '/checkreponse',
                type: "POST",
                data:{
                        r:reponses,
                        question_id:question_id,
                 
                 },
                success:function(response){
                    if(response ) {
                        if(response == 'correct'){
                            alert('bonne réponse');
                            // append bouton valider
                        }else{
                            alert('mauvaise réponse');
                            //append div + references
                        }
                        console.log(response);
                        
                     }else{
                         // erreur 500
                         console.log('erreur de code aucune donnes reçu');
                     }
                 },
            });
            
  
        })
    }



}