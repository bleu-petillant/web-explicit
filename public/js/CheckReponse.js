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
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked") > 0){
               valide.show();
               let reponse = $(this).val();
               reponses.push(reponse);


               
            }
            else if($(this).is(":not(:checked)" )){
                reponses = [];
               valide.hide();
            }
        });
         
        $('#check').on('click',function(e){
             e.preventDefault();
             let question_id = $('#question_id').val();
             let r = reponses.toString();
             console.log()
             $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            }),
            $.ajax({
                url: '/checkreponse',
                type: "POST",
                data:{
                        reponses:r,
                        question_id:question_id,
                 },
                success:function(response){
                     console.log(response);
                    if(response ) {

                        console.log(response);
                     }else{
                         console.log('mauvaise reponse');
                     }
                 },
            });
            
  
        })
    }

    checkIfValide()
    {
        $('#check').on('click',function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            }),
            $.ajax({
                url: '/formation/{slug}/episodes/{episodeNumber}',
                type: "Get",
            })
        })
    }

}