
class VideoController
{
    constructor()
    {
        $('#video_run')[0].play();
        let curr_question =  $('#currquestion').val();
        let total_question =  $('#totalquestion').val();
        
        this.Init();
        //this.calulePercentage(curr_question,total_question);
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
        //$('#video_run')[0].play();
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


class GetData
{
    constructor(data,total)
    {
        this.data = data;
        this.total = total;
        this.storeData(data,total);
    }

    storeData(data,total)
    {

        localStorage.clear();
        localStorage.setItem('questions', JSON.stringify(data));
        localStorage.setItem('total', total);
        
        this.getData();
    }

    getData()
    {
        let questions = JSON.parse(localStorage.getItem('questions'));
        let total = localStorage.getItem('total');
        let id = questions.id;
        let content = questions.content;
        let course_id = questions.course_id;
        let question_position = questions.question_position;
        let references1_cat = questions.references[0].category_id;
        let references2_cat = questions.references[1].category_id;
        let references1_title = questions.references[0].title;
        let references1_desc = questions.references[0].desc;
        let reponsecorrect = questions.reponses;

        for (let i = 0; i < reponsecorrect.length; i++) {
            
            const element = reponsecorrect[i];
            console.log(element);
        }
       
        video.calulePercentage(question_position,total);
        //console.log(questions);
        
    }

}


