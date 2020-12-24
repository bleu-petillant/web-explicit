$(document).ready(function()
{
    buildObject();


});





class VideoController
{
    constructor()
    {
        let curr_question =  $('#currquestion').val();
        let total_question =  $('#totalquestion').val();
        this.Init();
        this.calulePercentage(curr_question,total_question);
    }

     Init()
    {
        
        $('input:checkbox').attr('unchecked', 'unchecked');
        
       this.initVideoControll();
      

    }
    calulePercentage(curr,total)
    {
        let percent_total = curr / total * 100;
        let percent = $('#percent');
        percent.css("width", percent_total + "%");
    }

    initVideoControll()
    {
        $('#video_run')[0].play();
        let reset = $('#reset');
        reset.on('click',function(e){
            e.preventDefault();
            $('#video_run')[0].load();
            $('#video_run')[0].play();
        });
    }


}

class CheckResponse
{
    constructor()
    {
       
        this.checkTheReponse();
       this.checkIfValide();
    }

    checkTheReponse()
    {
         let valide = $('#valide');
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked") > 0){
               valide.show();
               
            }
            else if($(this).is(":not(:checked)")){
               valide.hide();
            }
        });
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


   function buildObject()
   {
       new VideoController();
        new CheckResponse();
   }
