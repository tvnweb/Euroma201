$(document).on('ready', function() {

  $('.single-slide').slick({
      dots: false,
      arrows:false,
      infinite: true,
      speed: 1500,
      autoplay:true,
      autoplaySpeed:3000,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true
    });

  $('.responsive').slick({
      dots: false,
      arrows:false,
      infinite: false,
      speed: 800,
      autoplay:true,
      autoplaySpeed:2000,
      slidesToShow: 5,
      slidesToScroll: 3,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            arrows:false,
            slidesToShow: 4,
            slidesToScroll: 2,
            infinite: true,
            autoplay:true,
            autoplaySpeed:2000

          }
        },
        {
          breakpoint: 640,
          settings: {
            arrows:false,
            slidesToShow: 3,
            slidesToScroll: 3,
            autoplay:true,
            autoplaySpeed:2000
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows:false,
            slidesToShow: 2,
            slidesToScroll: 2,
            autoplay:true,
            autoplaySpeed:2000
          }
        }
      ]
    });
});
