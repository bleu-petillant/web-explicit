class GetData
{
    constructor(data,total)
    {
        // we clean the localstorage at the start off the windows loading
        this.data = data;
        this.total = total;
        $('#indice').html("");
        // store the data
        this.storeData(data,total);
    }

    storeData(data,total)
    {
        
       // get the questions models php in json & store this into localstorage off the client side
        localStorage.setItem('questions', JSON.stringify(data));
        // get the total question  off the  course
        localStorage.setItem('total', total);
  
        this.getData();
    }

    getData()
    {

        // we make all variables off the questions json object
        let questions = JSON.parse(localStorage.getItem('questions'));
        let total = localStorage.getItem('total');
        let id = questions.id;
        let content = questions.content;
        let course_id = questions.course_id;
        let question_pos = questions.question_position;
        let references1_cat = questions.references[0].category_id;
        let references2_cat = questions.references[1].category_id;
        let references1_title = questions.references[0].title;
        let references1_desc = questions.references[0].desc;
        let references2_title = questions.references[1].title;
        let references2_desc = questions.references[1].desc;
        let reponsecorrect = questions.reponses;
        let videolink = questions.video;
        let indice = questions.indice;
        // we calculate  the percentage off the course progress 
        this.calulePercentageQuestion(question_pos,total);
 
        // we store all the answers off this questions in array
        let reponses = [];
        for (let i = 0; i < reponsecorrect.length; i++) {
            
            let r = reponsecorrect[i];

            // we push the questions in the array reponses
            reponses.push(r);

        }

      // we display the question and there answers
        this.displayQuestionReponse(content,reponses,course_id);
   
        
    }
    calulePercentageQuestion(curr,total)
    {
        $('#numberquestion').text(curr + '/' + total);
        let percent_total = curr / total * 100;
        let percent = $('#percent');
        percent.css("width", percent_total + "%");
        
    }

    displayQuestionReponse(question,reponses,course_id)
    {
        $('#question').text(question);
        for (let i = 0; i < reponses.length; i++) {
         
            let reponse_id = reponses[i].id;
            let question_id = reponses[i].question_id;
            let reponses_name = reponses[i].reponse;

            // we spawn  the answers in span and input
            $('#reponses').append('<span>'+reponses_name+'<input type="checkbox" name="reponses_id[]" class="form-checkbox" value="'+reponse_id+'"></span> ');
            // spawn the question
            $('#question_id').val(question_id);
            //$('#position').val(pos);
            $('#course_id').val(course_id)
        }  
    }

    NextQuestions(validate)
    {
       

        if(validate){
        
            $('#valide').html('').append('<a href="" id="next" ><i class="fa-2x fas fa-check"></i></a>').on('click',function(e){

                e.preventDefault();
                let slug = $('#slug').val();
                let url = "/formation/"+slug+"";
                localStorage.clear();
                window.location.href = url;
            });

        }else
        {
            window.location.href = "/nos formations";
        }

    }


}