class CheckResponse
{
    constructor()
    {
       // function for check and validate the answers by send ajax request to the controller
        this.validate  = false;
        this.checkTheReponse();
        

    }

    checkTheReponse()
    {
        let valide = $('#valide');
        //store each answer checked in this array
        let reponses = [];

        $("input[type=checkbox]").change(function(){
            if($(this).is(':checked')){
                // store the values of checkbos checked
                let reponse = $(this).val();
                reponses.push(reponse);
                $('#reset').hide();

            }else{
                // delete the items store i array if checkbox is uncheck
                var x = reponses.indexOf($(this).val());
                reponses.splice(x,1);

            }
            // show or hide the button validation if  one  at least checkbox is checked
            valide.toggle( $(".checkbox-quizz:checked").length > 0 );
        });

         // validation button
        $('#check').on('click',function(e){

             // get the value of question_id
            let question_id = $('#question_id').val();
            let question_pos = $('#position').val();
            let course_id = $('#course_id').val();
            $.ajaxSetup({
                 // make the header special laravel for ajax request don't delete this part !
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            e.preventDefault();
            $.ajax({
                url: '/checkreponse',
                type: "POST",
                data:{
                        r:reponses,
                        question_id:question_id,
                        course_id:course_id,
                        position:question_pos,

                },
                success:function(response){
                    if(response ) {
                        if(response == 'correct'){
                            this.validate = true;

                            // validate the answers and call the function for next questions

                            getdata.NextQuestions(this.validate);
                            console.log(response);

                        }else{
                        //we initialize a new array for answers and reset the checkbox
                        this.validate = false;
                        video.Reset();
                        reponses = [];

                            //append div + references
                            console.log("réference");
                        }
                        
                        
                    }else{
                         // erreur 500
                        console.log('erreur de code aucune donnes reçu');
                    }
                },
            });
            

        })
    }


}