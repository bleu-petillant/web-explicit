class SearchEngine {
    constructor() {
        
      let cat_select=  $("#category_id");
       let searchbar = $('#searchBar');
       this.reset = true;
       this.container_ref = $('.news-ressource-cards');
       this.noResult = $('#noresult');
       this.noResult.hide();
       searchbar.val('');
       this.InitSearchEngine(cat_select,searchbar);
    }

    InitSearchEngine(cat,searchbar)
    {
        cat.on('change', function(){
            const id = $(this).val();
    
            $.ajaxSetup({
                 // make the header special laravel for ajax request don't delete this part !
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $.ajax({
                url: '/search/cat',
                type: "POST",
                data:{
                    id:id,
                },
                success:function(response){
                    if(response) {
                        if(response.status == 'success'){
                            $('#noresult').hide();
                            searchengine.displayRefByCat(response); 
                        }
                        else if(response.status == 'error')
                        {
                            // no ressources , display div with error or redirect to 404 page
                           $('#noresult').show();
                            searchengine.DisplayNoResult();

                        }
                        
                        
                    }else{
                         // erreur 500
                        console.log('erreur de code aucune donnes reçu');
                    }
                },
            });
        });


        searchbar.on("keyup",function(e){
            const query = $(this).val();
            const id = $("#category_id").val();
            if(e.keyCode == 8 && query.length == 0) {
                searchengine.resetReferences();
            }
            if(query.length > 2)
            {
                this.reset = false;
                 $.ajaxSetup({
                    // make the header special laravel for ajax request don't delete this part !
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                $.ajax({
                    url: '/search/query',
                    type: "POST",
                    data:{
                        id:id,
                        query:query
                    },
                    success:function(response){
                        if(response) {
                            if(response.status == 'success'){
                              
                                $('#noresult').hide();
                                 searchengine.displayRefByQuery(response); 

                                
                            }
                            else if(response.status == 'error')
                            {
                                // no ressources , display div with error or redirect to 404 page
                            $('#noresult').show();
                              searchengine.DisplayNoResult();
                            }
                        }else{
                            // erreur 500
                            console.log('erreur de code aucune donnes reçu');
                        }
                    },
                });
            }
         });
    }


    DisplayNoResult()
    {
        this.container_ref.html("");
        $('#noresult').text("pas de résultats pour cette recherche");
        this.reset = false;
    }

    displayRefByCat(data)
    {
       
        $('#result').text("résultat de la recherche");
        const data_ref = data[0];
        let container_ref = $('.news-ressource-cards');
        container_ref.html("");
        for (let i = 0; i < data_ref.length; i++) {
            const images = data_ref[i].image;
            const alt = data_ref[i].alt;
            const title = data_ref[i].title;
            const desc = data_ref[i].desc;
            const pdf = data_ref[i].pdf;
            const link = data_ref[i].link;
 
            if (data_ref[i].category_id == 1)
            {
                container_ref.append(
                    '<div class="pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 "><a href="" >'+
                                '<img class="pdf-card card-image w-full h-40 object-cover" src="'+images+'" alt="'+alt+'">'+
                                '<div class="mt-2 py-3 pl-2 pdf-card-content">'+
                                    '<p class="category pdf-color ">pdf</p>'+
                                    '<h3 class="card-title text-2xl font-bold">'+title+'</h3>'+
                                    '<p class="card-text">'+desc+'</p>'+
                                '</div>'+
                                '<p class="text-center mt-5 mb-5"><a href="'+pdf+'" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>'+
                            '</a>'+
                        '</div>'
                )
            }
            else if (data_ref[i].category_id == 2)
            {
                container_ref.append(
                    '<div class="video-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 "><a href="" >'+
                                '<img class="video-card card-image w-full h-40 object-cover" src="'+images+'" alt="'+alt+'">'+
                                '<div class="mt-2 py-3 pl-2 video-card-content">'+
                                    '<p class="category video-color ">video</p>'+
                                    '<h3 class="card-title text-2xl font-bold">'+title+'</h3>'+
                                    '<p class="card-text">'+desc+'</p>'+
                                '</div>'+
                                '<p class="text-center mt-5 mb-5"><a href="'+link+'" class="video-button uppercase mx-auto tracking-wider">Lien</a></p>'+
                            '</a>'+
                        '</div>'
                )
             }
             else if (data_ref[i].category_id == 3)
             {
                container_ref.append(
                    '<div class="podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 "><a href="" >'+
                                '<img class="podcast-card card-image w-full h-40 object-cover" src="'+images+'" alt="'+alt+'">'+
                                '<div class="mt-2 py-3 pl-2 podcast-card-content">'+
                                    '<p class="category podcsat-color ">podcast</p>'+
                                    '<h3 class="card-title text-2xl font-bold">'+title+'</h3>'+
                                    '<p class="card-text">'+desc+'</p>'+
                                '</div>'+
                                '<p class="text-center mt-5 mb-5"><a href="'+link+'" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>'+
                            '</a>'+
                        '</div>'
                )
             }
             else if (data_ref[i].category_id == 4)
             {
                container_ref.append(
                    '<div class="pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 "><a href="" >'+
                                '<img class="pdf-card card-image w-full h-40 object-cover" src="'+images+'" alt="'+alt+'">'+
                                '<div class="mt-2 py-3 pl-2 pdf-card-content">'+
                                    '<p class="category pdf-color ">articles</p>'+
                                    '<h3 class="card-title text-2xl font-bold">'+title+'</h3>'+
                                    '<p class="card-text">'+desc+'</p>'+
                                '</div>'+
                                '<p class="text-center mt-5 mb-5"><a href="'+link+'" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>'+
                            '</a>'+
                        '</div>'
                )
             }else{
                 // no ressources , display div or span with error messages
                 container_ref.append('<span>pas de ressources dans cette cat</span>');
            }

           
        }
        this.reset = true;
        searchengine.resetSlickSlider();
        
    }

     displayRefByQuery(data)
     {
        $('#result').text("résultat de la recherche");
         const data_ref = data[0];
         let container_ref = $('.news-ressource-cards');
         container_ref.html("");
         for (let i = 0; i < data_ref.length; i++) {
             const images = data_ref[i].image;
             const alt = data_ref[i].alt;
             const title = data_ref[i].title;
             const desc = data_ref[i].desc;
             const pdf = data_ref[i].pdf;
             const link = data_ref[i].link;
 
             if (data_ref[i].category_id == 1)
             {
                 container_ref.append(
                     '<div class="pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 "><a href="" >'+
                                 '<img class="pdf-card card-image w-full h-40 object-cover" src="'+images+'" alt="'+alt+'">'+
                                 '<div class="mt-2 py-3 pl-2 pdf-card-content">'+
                                     '<p class="category pdf-color ">pdf</p>'+
                                     '<h3 class="card-title text-2xl font-bold">'+title+'</h3>'+
                                     '<p class="card-text">'+desc+'</p>'+
                                 '</div>'+
                                 '<p class="text-center mt-5 mb-5"><a href="'+pdf+'" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>'+
                             '</a>'+
                         '</div>'
                 )
             }
             else if (data_ref[i].category_id == 2)
             {
                 container_ref.append(
                     '<div class="video-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 "><a href="" >'+
                                 '<img class="video-card card-image w-full h-40 object-cover" src="'+images+'" alt="'+alt+'">'+
                                 '<div class="mt-2 py-3 pl-2 video-card-content">'+
                                     '<p class="category video-color ">video</p>'+
                                     '<h3 class="card-title text-2xl font-bold">'+title+'</h3>'+
                                     '<p class="card-text">'+desc+'</p>'+
                                 '</div>'+
                                 '<p class="text-center mt-5 mb-5"><a href="'+link+'" class="video-button uppercase mx-auto tracking-wider">Lien</a></p>'+
                             '</a>'+
                         '</div>'
                 )
              }
              else if (data_ref[i].category_id == 3)
              {
                 container_ref.append(
                     '<div class="podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 "><a href="" >'+
                                 '<img class="podcast-card card-image w-full h-40 object-cover" src="'+images+'" alt="'+alt+'">'+
                                 '<div class="mt-2 py-3 pl-2 podcast-card-content">'+
                                     '<p class="category podcsat-color ">podcast</p>'+
                                     '<h3 class="card-title text-2xl font-bold">'+title+'</h3>'+
                                     '<p class="card-text">'+desc+'</p>'+
                                 '</div>'+
                                 '<p class="text-center mt-5 mb-5"><a href="'+link+'" class="podcast-button uppercase mx-auto tracking-wider">Lien</a></p>'+
                             '</a>'+
                         '</div>'
                 )
              }
              else if (data_ref[i].category_id == 4)
              {
                 container_ref.append(
                     '<div class="pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 "><a href="" >'+
                                 '<img class="pdf-card card-image w-full h-40 object-cover" src="'+images+'" alt="'+alt+'">'+
                                 '<div class="mt-2 py-3 pl-2 pdf-card-content">'+
                                     '<p class="category pdf-color ">articles</p>'+
                                     '<h3 class="card-title text-2xl font-bold">'+title+'</h3>'+
                                     '<p class="card-text">'+desc+'</p>'+
                                 '</div>'+
                                 '<p class="text-center mt-5 mb-5"><a href="'+link+'" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>'+
                             '</a>'+
                         '</div>'
                 )
              }else{
                  // no ressources , display div or span with error messages
                  container_ref.append('<span>pas de ressources dans cette cat</span>')
             }
             
         }
         this.reset = false;
         this.resetSlickSlider();
         
    }


     resetReferences()
    {
        if(this.reset == false){
        $('#noresult').hide();
        let container_ref = $('.news-ressource-cards');
        container_ref.html("");
            $.ajaxSetup({

                 // make the header special laravel for ajax request don't delete this part !
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $.ajax({
                url: '/search/cat',
                type: "POST",
                data:{
                    id:'',
                },
                success:function(response){
                    if(response) {
                        if(response.status == 'success'){
                            
                            searchengine.displayRefByCat(response); 
                            $('#result').text("Nouveautés");
                         
                        }
                        else
                        {
                            // no ressources , display div with error or redirect to 404 page
                            console.log('pas de category'); 
                        }
                        
                        
                    }else{
                         // erreur 500
                        console.log('erreur de code aucune donnes reçu');
                    }
                },
            });
            searchengine.resetSlickSlider();
           
        }
        
    }

        resetSlickSlider()
    {
        let container_ref = $('.news-ressource-cards');
        // container du slider , remove les classe et reinitialize
        container_ref.removeClass('slick-initialized  slick-slider');

        container_ref.slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        nextArrow: '<i class="slick-next fa fa-chevron-right"></i>',
        prevArrow: '<i class="slick-prev fa fa-chevron-left"></i>',
        adaptiveHeight: false,
        dots: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
              dots: false
            }
          },
          {
            breakpoint: 850,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }

        ]
    });
    }
                
               
}
            