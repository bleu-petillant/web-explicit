$(document).ready(function(){

    $('.ressource-cards').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: false,
        adaptiveHeight: true,
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
              }
            },
            {
                breakpoint: 640,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true,
                }
              },
        ]
    });

    $('.mobile-cas-usage').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        adaptiveHeight: true,
      });






});


