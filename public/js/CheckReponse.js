
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
        this.ressourceContainerTitle = $('#title_ressources');
        this.nextcourseContainer = $('#nextcourse');
        this.nextcourseContainer.html('');
        this.nextcourseContainer.hide();
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
            console.log("check");
            $('.overlay-video').show();
            $('#video_run').trigger('pause');
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
                            valide.hide();
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
        $('#check').hide();
        $('#reset').show();
        
        
        // on vide le html de l'indice
        this.ressourceContainer.append('<p class=" mx-auto pl-4">Avant de retenter ta chance, voici ce que tu dois connaitre : </p>');
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
                this.ressourceContainer.append('<div class="col-sm-6 col-md-6 course-ref-card"><a class="mr-2" href="'+pdf+'"target="__blank"><div class=" pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl  "><p class="category category-course-ref pdf-color ">pdf</p><p class= "text-reference-formation  text-base font-semibold">'+title+'</p><br></div></a></div>');
            }else if(cat == 2)
            {
                this.ressourceContainer.append('<div class=" col-sm-6 col-md-6 course-ref-card"><a class="mr-2" href="'+link+'" target="__blank"><div class=" video-card-content card bg-white w-full shadow-lg hover:shadow-xl  "><p class="category category-course-ref video-color ">vidéo</p><p class= "text-reference-formation  text-base font-semibold">'+title+'</p><br></div></a></div>');
            }else if(cat == 3)
            {
                this.ressourceContainer.append('<div class="col-sm-6 col-md-6 course-ref-card"><a class="mr-2" href="'+link+'" target="__blank"><div class=" podcast-card-content card bg-white w-full shadow-lg hover:shadow-xl  "><p class="category category-course-ref podcast-color ">podcast</p><p class= "text-reference-formation text-base font-semibold">'+title+'</p><br></div></a></div>');
            }else
            {
                this.ressourceContainer.append('<div class="col-sm-6 col-md-6 course-ref-card"><a class="mr-2" href="'+link+'" target="__blank"><div class=" pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl  "><p class="category category-course-ref podcast-color ">article</p><p class= "text-reference-formation text-base font-semibold">'+title+'</p><br></div></a></div>');
            }
        }
        
        
    }

    showIndice(ressource,indice)
    {
        $.each($(".checked "), function(){

            // pour chaque checkbox et reponse fausse change la classe des checkbox pour les passer en rouge
            $(this).next('.span-reponse').toggleClass('span-reponse').addClass('reponse-false');
            
            
        });
        let seconds = 500;
        // au bout de 2 seconde, on montre l'indice, tu peux changer le timer avec la variable seconds
        setTimeout(() => {
            $('#reponses_form').hide();
            this.showTheIndice(ressource,indice);
            getdata.resetQuestion();
        }, seconds);
        

    }

    showRessources(ressource)
    {
        $.each($(".checked "), function(){

            // pour chaque checkbox  et reponse fausse change la classe des checkbox pour les passer en rouge
            $(this).next('.span-reponse').toggleClass('span-reponse').addClass('reponse-true');
            
            
        });
        let ref = ressource.references;

        this.ressourceContainer.show();
        this.ressourceContainer.append('<div class="col-md-12 col-lg-12 col-sm-12 mt-2"><p class="pl-4">Approfondissez avec ces ressources : </p></div>');
        $('#valide').hide();
        // on instancie les ressources associer
        for (let i = 0; i < ref.length; i++) {
            let title = ref[i].title;
            let cat = ref[i].category_id;
            let desc = ref[i].desc;
            let link = ref[i].link;
            let pdf = ref[i].pdf;

            if(cat == 1)
            {
                this.ressourceContainer.append('<div class="col-sm-6 col-md-6 course-ref-card "><a class="mr-2" href="'+pdf+'"target="__blank"><div class="all-pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref pdf-color ">pdf</p><p class= "text-reference-formation text-base font-semibold">'+title+'</p><br></div></a></div>');
            }else if(cat == 2)
            {
                this.ressourceContainer.append('<div class="col-sm-6 col-md-6 course-ref-card  "><a class="mr-2" href="'+link+'" target="__blank"><div class="all-video-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref video-color ">vidéo</p><p class= "text-reference-formation text-base font-semibold">'+title+'</p><br></div></a></div>');
            }else if(cat == 3)
            {
                this.ressourceContainer.append('<div class="col-sm-6 col-md-6 course-ref-card  "><a class="mr-2" href="'+link+'" target="__blank"><div class="all-podcast-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref podcast-color ">podcast</p><p class= "text-reference-formation text-base font-semibold">'+title+'</p><br></div></a></div>');
            }else
            {
                this.ressourceContainer.append('<div class="col-sm-6 col-md-6 course-ref-card "><a class="mr-2" href="'+link+'" target="__blank"><div class="all-podcast-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref podcast-color ">article</p><p class= "text-reference-formation text-base font-semibold">'+title+'</p><br></div></a></div>');
            }
        }



    }

    showNextCourse(course,nextcourse)
    {
        let next_ref = nextcourse.references;
        let nextslug = nextcourse.slug;
        let next_course_object =nextcourse;
        let img = next_course_object.image;
        let title = next_course_object.title;

        this.showRessources(course);
        this.nextcourseContainer.show();
        const base_url = window.location.origin;
        $('#video_run').hide();
        $('#question').html("");
        $('#reponses').html("");
        $('#victory').show();
        

        $('#right_course_side').removeClass('right-quizz-container');
        $('#right_course_side').addClass('right-quizz-container2');
        // div 
        this.nextcourseContainer.append(
            
            '<h3 class="text-center mt-4">Autre formation</h3>'+
            '<p class="text-center">'+title+'</p>'+
            '<a href="'+nextslug+'" id="next_course_link" ><div class="relative formation-next-image"><div class="round-formation"><i class="play-button button-usage-1 fas fa-play" aria-hidden="true"></i></div><div class="w-full  absolute"><img src="'+base_url+'/'+img+'"></div></div></a>'+
            '<p class="mt-4 text-center"> Référence nécessaire pour cette formation</p>'+
            '<div id="ressource_course_next" class="row"> </div>'
            );
            
        // on instancie les ressources associer
        
        for (let i = 0; i < next_ref.length; i++) {
            let title = next_ref[i].title;
            let cat = next_ref[i].category_id;
            let desc = next_ref[i].desc;
            let link = next_ref[i].link;
            let pdf = next_ref[i].pdf;

            if(cat == 1)
            {
                $('#ressource_course_next').append('<div class="col-sm-6 col-md-6 course-ref-card  "><a class="mr-2" href="'+pdf+'"target="__blank"><div class="next-formation-ressource all-pdf-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref pdf-color ">pdf</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br></div></a></div>');
            }else if(cat == 2)
            {
                $('#ressource_course_next').append('<div class="col-sm-6 col-md-6 course-ref-card  "><a class="mr-2" href="'+link+'" target="__blank"><div class="next-formation-ressource all-video-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref video-color ">vidéo</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br></div></a></div>');
            }else if(cat == 3)
            {
                $('#ressource_course_next').append('<div class="col-sm-6 col-md-6 course-ref-card  "><a class="mr-2" href="'+link+'" target="__blank"><div class="next-formation-ressource all-podcast-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref podcast-color ">podcast</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br></div></a></div>');
            }else
            {
                $('#ressource_course_next').append('<div class="col-sm-6 col-md-6 course-ref-card "><a class="mr-2" href="'+link+'" target="__blank"><div class="next-formation-ressource all-podcast-card-content card bg-white w-full shadow-lg hover:shadow-xl mx-auto "><p class="category category-course-ref podcast-color ">article</p><p class= "text-reference-formation text-center text-base font-semibold">'+title+'</p><br></div></a></div>');
            }
        }

        $('#next_course_link').on('click',function(e){

                e.preventDefault();
                let url = "/formation/"+nextslug+"";
                localStorage.clear();
                window.location.href = url;
        });

    }

    
}