class CheckResponse
{
    constructor()
    {
       // function for check and validate the answers by send ajax request to the controller

        this.validate  = false;
        this.showindice = false;
        this.showressource = false;
        this.shownextCourse = false;
        this.indiceContainer = $('#indice');
        this.ressourceContainer = $('#ressources');
        this.nextcourseContainer = $('#nextcourse');
        this.resetAllContainer();
        this.checkTheReponse();

        

    }

    resetAllContainer()
    {
        this.indiceContainer.html("");
        this.ressourceContainer.html("");
        this.nextcourseContainer.html("");
        this.indiceContainer.hide();
        this.ressourceContainer.hide();
        this.nextcourseContainer.hide();
    }
    checkTheReponse()
    {
        let valide = $('#valide');
        //store each answer checked in this array
        let reponses = [];

        $("input[type=checkbox]").change(function(){
            if($(this).is(':checked')){
                $(this).addClass("checked");
                // store the values of checkbos checked
                let reponse = $(this).val();
                reponses.push(reponse);
                $('#reset').hide();
                $(this).css('backgroud-color', '#6d7aea');

            }else{
                // delete the items store i array if checkbox is uncheck
                var x = reponses.indexOf($(this).val());
                reponses.splice(x,1);
                $(this).removeClass("checked");

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

            $('#indice').hide();
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
                        if(response.status == 'correct'){

                            this.validate = true;
                            reponse.showRessources(response[0]);
                            getdata.NextQuestions(this.validate); 
                            
                        }else if(response.status == 'error'){
                            
                            this.validate = false;
                            reponse.showIndice(response[0],response[1]);
                            
                            reponses = [];
                            
                        }else if(response.status == 'next')
                        {
                            // prochaine formation
                            this.validate = true;
                            valide.hide();
                            reponse.showNextCourse(response[0],response[1]);
                            
                        }else if(response.status == 'other')
                        {
                            //autres formation
                            this.validate = true;
                            valide.hide();
                            
                            reponse.showNextCourse(response[0],response[1]);
                        }
                        
                        
                    }else{
                         // erreur 500
                        console.log('erreur de code aucune donnes reçu');
                    }
                },
            });
            

        })
    }


    showTheIndice(ressource,indice)
    {

        let ref = ressource.references;
        $( ".form-checkbox" ).prop( "checked", false );
        $('#reponses').addClass('hidden');
        $('#reponses_form').hide();
        // on vide le html de l'indice
        
        this.indiceContainer.show();
        // on instancie un nouvel indice avec la valeur indice dedans
        this.indiceContainer.append('<div class="indice"><p class="font-bold mb-2">Indice</p><p>'+indice.indice+'</p></div>');
        this.ressourceContainer.show();
        // on instancie les ressources associer
        for (let i = 0; i < ref.length; i++) {
            let title = ref[i].title;
            let cat = ref[i].category_id;
            let desc = ref[i].desc;
            let link = ref[i].link;
            let pdf = ref[i].pdf;

            if(cat == 1)
            {
                this.ressourceContainer.append('<a class="mr-2" href="'+pdf+'"target="__blank"><div class="pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref pdf-color ">pdf</p><p class= "text-reference-formation  text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation  text-base ">'+desc+'</p><br></div></a>');
            }else if(cat == 2)
            {
                this.ressourceContainer.append('<a class="mr-2" href="'+link+'" target="__blank"><div class="video-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref video-color ">vidéo</p><p class= "text-reference-formation  text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation  text-base ">'+desc+'</p><br></div></a>');
            }else if(cat == 3)
            {
                this.ressourceContainer.append('<a class="mr-2" href="'+link+'" target="__blank"><div class="podcast-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref podcast-color ">podcast</p><p class= "text-reference-formation text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation text-base">'+desc+'</p><br></div></a>');
            }else
            {
                this.ressourceContainer.append('<a class="mr-2" href="'+link+'" target="__blank"><div class="pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref pdf-color ">article</p><p class= "text-reference-formation text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation text-base ">'+desc+'</p><br></div></a>');
            }
        }
        this.resetQuestion();
        
    }

    showIndice(ressource,indice)
    {
        $.each($(".checked "), function(){

            // pour chaque checkbox  et reponse fausse change la classe des checkbox pour les passer en rouge
            $(this).next('.span-reponse').addClass('reponse-false');
            
            
        });
        let seconds = 3000;
        // au bout de 3 seconde , on montre l'indice, tu peux changer le timer avec la variable seconds
        setTimeout(() => {
            this.showTheIndice(ressource,indice);
        }, seconds);

    }

    showRessources(ressource)
    {
        $.each($(".checked "), function(){

            // pour chaque checkbox  et reponse fausse change la classe des checkbox pour les passer en rouge
            $(this).next('.span-reponse').addClass('reponse-true');
            
            
        });
        let ref = ressource.references;

        this.ressourceContainer.show();
        // on instancie les ressources associer
        for (let i = 0; i < ref.length; i++) {
            let title = ref[i].title;
            let cat = ref[i].category_id;
            let desc = ref[i].desc;
            let link = ref[i].link;
            let pdf = ref[i].pdf;

            if(cat == 1)
            {
                this.ressourceContainer.append('<a class="mr-2" href="'+pdf+'"target="__blank"><div class="pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref pdf-color ">pdf</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation text-center text-base font-semibold">'+desc+'</p><br></div></a>');
            }else if(cat == 2)
            {
                this.ressourceContainer.append('<a class="mr-2" href="'+link+'" target="__blank"><div class="video-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref video-color ">vidéo</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation text-center text-base font-semibold">'+desc+'</p><br></div></a>');
            }else if(cat == 3)
            {
                this.ressourceContainer.append('<a class="mr-2" href="'+link+'" target="__blank"><div class="podcast-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref podcast-color ">podcast</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation text-center text-base font-semibold">'+desc+'</p><br></div></a>');
            }else
            {
                this.ressourceContainer.append('<a class="mr-2" href="'+link+'" target="__blank"><div class="pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref pdf-color ">article</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation text-center text-base font-semibold">'+desc+'</p><br></div></a>');
            }
        }



    }

    showNextCourse(course,nextcourse)
    {
        let next_ref = nextcourse.references;
        let nextslug = nextcourse.slug;
        this.showRessources(course);
        

        this.nextcourseContainer.show();
        // div 
        this.nextcourseContainer.append('<a href="'+nextslug+'" id="next_course_link" ><i class="fa-2x fas fa-check"></i></a>')
        // on instancie les ressources associer
        for (let i = 0; i < ref.length; i++) {
            let title = next_ref[i].title;
            let cat = next_ref[i].category_id;
            let desc = next_ref[i].desc;
            let link = next_ref[i].link;
            let pdf = next_ref[i].pdf;

            if(cat == 1)
            {
                this.nextcourseContainer.append('<a class="mr-2" href="'+pdf+'"target="__blank"><div class="pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref pdf-color ">pdf</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation text-center text-base font-semibold">'+desc+'</p><br></div></a>');
            }else if(cat == 2)
            {
                this.nextcourseContainer.append('<a class="mr-2" href="'+link+'" target="__blank"><div class="video-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref video-color ">vidéo</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation text-center text-base font-semibold">'+desc+'</p><br></div></a>');
            }else if(cat == 3)
            {
                this.nextcourseContainer.append('<a class="mr-2" href="'+link+'" target="__blank"><div class="podcast-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref podcast-color ">podcast</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation text-center text-base font-semibold">'+desc+'</p><br></div></a>');
            }else
            {
                this.nextcourseContainer.append('<a class="mr-2" href="'+link+'" target="__blank"><div class="pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref pdf-color ">article</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br><p class= "text-reference-formation text-center text-base font-semibold">'+desc+'</p><br></div></a>');
            }
        }

        $('#next_course_link').on('click',function(e){

                e.preventDefault();
                let url = "/formation/"+nextslug+"";
                localStorage.clear();
                window.location.href = url;
        });

    }

    resetQuestion()
    {
        $('#reset').show();
        $('#valide').hide();
        $( ".form-checkbox" ).prop( "checked", false );
        $('#reponses').show();
    }
}