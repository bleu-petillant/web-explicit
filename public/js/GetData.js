class GetData
{
    constructor(data,total)
    {
        localStorage.clear();
        this.data = data;
        this.total = total;
        this.storeData(data,total);
    }

    storeData(data,total)
    {

       
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
        let references2_title = questions.references[1].title;
        let references2_desc = questions.references[1].desc;
        let reponsecorrect = questions.reponses;
        let videolink = questions.video;
        let reponses = [];
        for (let i = 0; i < reponsecorrect.length; i++) {
            
            let r = reponsecorrect[i];
            
            reponses.push(r);

        }

       
        this.calulePercentageQuestion(question_position,total);
      
        this.displayQuestionReponse(content,reponses,reponsecorrect);
        //console.log(questions);
        
    }
    calulePercentageQuestion(curr,total)
    {
        $('#numberquestion').text(curr + '/' + total);
        let percent_total = curr / total * 100;
        let percent = $('#percent');
        percent.css("width", percent_total + "%");
    }

    displayQuestionReponse(question,reponses,r_correct)
    {
        $('#question').text(question);

        for (let i = 0; i < reponses.length; i++) {
            let r = reponses[i].correct;
            let reponse_id = reponses[i].id;
            let question_id = reponses[i].question_id;
            let reponses_name = reponses[i].reponse;

            $('#reponses').append('<span>'+reponses_name+'<input type="checkbox" name="reponses_id[]" class="form-checkbox" value="'+reponse_id+'"></span> ');
            $('#question_id').val(question_id);

            
        }

        
    }



}