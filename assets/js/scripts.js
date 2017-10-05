jQuery(document).ready(function ($) {

   // Owl Carousel
   $('.owl-carousel-class-name').owlCarousel({
      items: 4,
      loop: true,
      autoplay: true,
      dots: true,
      margin: 15,
      nav: true,
      navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
      responsiveClass: true,
      responsive: {
         0: {
            items: 1,
            nav: true
         },
         600: {
            items: 3,
            nav: false
         },
         1000: {
            items: 5,
            nav: true,
            loop: false
         }
      }
   });

   // Other Scripts


});
