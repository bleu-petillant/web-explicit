$(document).ready(function(){

    $('.ressource-cards').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
        nextArrow: '<i class="slick-next fa fa-chevron-right"></i>',
        prevArrow: '<i class="slick-prev fa fa-chevron-left"></i>',
        adaptiveHeight: true,
        responsive: [
          {
            breakpoint: 1440,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
            }
          },
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

    $('.home-cas-usage').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: true,
        nextArrow: '<i class="slick-next fa fa-chevron-right"></i>',
        prevArrow: '<i class="slick-prev fa fa-chevron-left"></i>',
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






});


