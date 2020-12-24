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
        let videolink = questions.video;
        let reponses = [];
        for (let i = 0; i < reponsecorrect.length; i++) {
            
            let r = reponsecorrect[i];
            reponses.push(r);

        }
       
        this.calulePercentageQuestion(question_position,total);
      
        this.displayQuestionReponse(content,reponses);
        //console.log(questions);
        
    }
    calulePercentageQuestion(curr,total)
    {
        $('#numberquestion').text(curr + '/' + total);
        let percent_total = curr / total * 100;
        let percent = $('#percent');
        percent.css("width", percent_total + "%");
    }

    displayQuestionReponse(question,reponses)
    {
        $('#question').text(question);

        for (let i = 0; i < reponses.length; i++) {
            let r = reponses[i].reponse;
            let reponse_id = reponses[i].id;
            let question_id = reponses[i].question_id;
            $('#reponses').append('<span>'+r+'<input type="checkbox" name="reponses[]" class="form-checkbox" value="'+reponse_id+'"></span> ');
            $('#question_id').val(question_id);
        }
        
    }



}