"use strict";
document.addEventListener("DOMContentLoaded", function () {

    $(function ($) {

          /* niceSelect */
          $("select").niceSelect();

    
            // secondary testimonial_swiper
            var swiper = new Swiper(".credit_swiper", {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                speed: 2000,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });

        // // Common Silder 1
        // let commonSlide1 = document.querySelectorAll('.common-slider1');
        // commonSlide1.forEach(function (commonSlide1) {
        //     var swiper = new Swiper(commonSlide1, {
        //         loop: true,
        //         slidesPerView: 1,
        //         slidesToShow: 1,
        //         paginationClickable: true,
        //         spaceBetween: 14,
        //         centeredSlides: true,
        //         speed: 2000,
        //         autoplay: {
        //             delay: 3000,
        //             disableOnInteraction: false,
        //         },
        //         navigation: {
        //             nextEl: commonSlide1.querySelector('.ara-next'),
        //             prevEl: commonSlide1.querySelector('.ara-prev'),
        //         },
        //         breakpoints: {
        //             1400: {
        //                 slidesPerView: 1.48,
        //                 centeredSlides:true,
        //             },
        //             1200: {
        //                 slidesPerView: 1.22,
        //                 centeredSlides:false,
        //             },

        //         }
        //     });
        // });


        /* Wow js */
        new WOW().init();

        // magnific-popup
        $('.popup-video').magnificPopup({
            type: 'iframe'
        });

      
        if (document.querySelector("#editor")) {
            var quill = new Quill('#editor', {
                theme: 'snow'
            });
        }
    });
});
