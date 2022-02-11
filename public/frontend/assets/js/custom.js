(function($) {
    "use strict";
    $( document ).ready(function() {

      $('.stellarnav').stellarNav({
			
				breakpoint: 1024,
        showArrows: true,
        menuLabel: '',
				position: 'right',
        closeBtn: true, 
        closeLabel: '', 
			});

    //////////Price Tab////
     
    //  $(".pricing_tab .nav-link:first-child").addClass('active');
      $(".pricing_tab .nav-link:first").addClass("active");
      $(".tab-content .tab-pane:first").addClass("active show");

    ////////////slider////

    $('.packages').slick({
        dots: false,
        arrows:false,
        infinite: true,
        speed: 300,
        slidesToShow:4,
        slidesToScroll:4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll:2,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow:1,
              slidesToScroll:1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          
        ]
      });

    ////////////Content////
    $('.content_open').click(function(){
        $(this).addClass('hide_content');
        $('.main_content').removeClass('hide_content');

    });

    $('.content_close').click(function(){
      $('.content_open').removeClass('hide_content');
      $('.main_content').addClass('hide_content');

  });

});
})(jQuery);