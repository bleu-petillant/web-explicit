$(document).ready(function(){

  

    $('.news-ressource-cards').slick({
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
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      
    });

    let seconds = 2000;
    // au bout de 2 seconde , on montre l'indice, tu peux changer le timer avec la variable seconds
    setTimeout(() => {
        $('#loading').toggleClass('hidden');
        $("body").toggleClass("")
    }, seconds);

    

      var itemSelector = '.grid-item'; 

      var $container = $('#container').isotope({
        itemSelector: itemSelector,
        masonry: {
          columnWidth: 100,
          fitWidth: true
        }
      });
    
      //Ascending order
      var responsiveIsotope = [
        [480, 4],
        [720, 4]
      ];
    
      var itemsPerPageDefault = 6;
      var itemsPerPage = defineItemsPerPage();
      let items = $('.grid-item').length;
      var currentNumberPages = 1;
      var currentPage = 1;
      var currentFilter = '*';
      var filterAtribute = 'data-filter';
      var pageAtribute = 'data-page';
      var pagerClass = 'isotope-pager';
    
      function changeFilter(selector) {
        $container.isotope({
          filter: selector
        });
      }
    
      function countItems()
      {
        if (items <= itemsPerPageDefault) {
          $(".isotope-pager").hide();
        }
        
      }
      function goToPage(n) {
        currentPage = n;
    
        var selector = itemSelector;
          selector += ( currentFilter != '*' ) ? '['+filterAtribute+'="'+currentFilter+'"]' : '';
          selector += '['+pageAtribute+'="'+currentPage+'"]';
    
        changeFilter(selector);
      }
    
      function defineItemsPerPage() {
        var pages = itemsPerPageDefault;
    
        for( var i = 0; i < responsiveIsotope.length; i++ ) {
          if( $(window).width() <= responsiveIsotope[i][0] ) {
            pages = responsiveIsotope[i][1];
            break;
          }
    
          
    
        }


        


        
        return pages;
      }
      
      function setPagination() {
    
        var SettingsPagesOnItems = function(){
    
          var itemsLength = $container.children(itemSelector).length;
          
          var pages = Math.ceil(itemsLength / itemsPerPage);
          var item = 1;
          var page = 1;
          var selector = itemSelector;
            selector += ( currentFilter != '*' ) ? '['+filterAtribute+'="'+currentFilter+'"]' : '';
          
          $container.children(selector).each(function(){
            if( item > itemsPerPage ) {
              page++;
              item = 1;
            }
            $(this).attr(pageAtribute, page);
            item++;
          });
    
          currentNumberPages = page;
    
        }();
    
        var CreatePagers = function() {
    
          var $isotopePager = ( $('.'+pagerClass).length == 0 ) ? $('<div class="'+pagerClass+'"></div>') : $('.'+pagerClass);
    
          $isotopePager.html('');
          
          for( var i = 0; i < currentNumberPages; i++ ) {
            var $pager = $('<a href="javascript:void(0);" class="pager" '+pageAtribute+'="'+(i+1)+'"></a>');
              $pager.html(i+1);
              
              $pager.click(function(){
                var page = $(this).eq(0).attr(pageAtribute);
                goToPage(page);
              });
    
            $pager.appendTo($isotopePager);
          }
    
          $container.after($isotopePager);
    
        }();
    
      }
    
      setPagination();
      goToPage(1);
      countItems();
    
      //Adicionando Event de Click para as categorias
      $('.filters a').click(function(){
        var filter = $(this).attr(filterAtribute);
        currentFilter = filter;
    
        setPagination();
        goToPage(1);
    
    
      });
    
      //Evento Responsivo
      $(window).resize(function(){
        itemsPerPage = defineItemsPerPage();
        setPagination();
        goToPage(1);
      });



});

