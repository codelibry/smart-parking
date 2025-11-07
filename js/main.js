jQuery(function($) {

    /*
     * Video Popup
     */
    $(document).ready(function () {
        $('.play-button').fancybox();
    });


    /*
     * Header Mega-Menu
     */
    $(document).on('click', function (e) {
        // Check if the click happened outside the menu item
        if (!$(e.target).closest('header .menu > li').length) {
            $('header .menu > li').removeClass('active');
        }
    });


    /*
     * Prevent the menu item click from bubbling up to the document
     */
    $('header .menu > li').on('click', function (e) {
        e.stopPropagation();

        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        }
    });


    /*
     * Appeal Reasons Dropdown
     */
    $('#appeal-reasons-dropdown').change(function () {
        var selectedReasonId = $('#appeal-reasons-dropdown').val();
        var currentId = selectedReasonId.toString().substring(selectedReasonId.lastIndexOf('-') + 1);

        $('.appeal-reason-details').hide();
        $('#appeal-body-' + currentId).fadeIn();
    });


    /*
     * Testimonials Carousel
     */
    if($('.testimonials-carousel').length) {
      const testimonialsCount = $('.testimonials-carousel').attr('data-testimonials-count');

      console.log(testimonialsCount);

      $('.testimonials-carousel').owlCarousel({
          margin: 80,
          autoplayTimeout: 3000,
          autoplayHoverPause: true,
          nav: testimonialsCount > 3,
          responsive:{
              0: {
                  items: 1,
                  loop: testimonialsCount > 1,
                  nav: testimonialsCount > 1,
                  autoplay: testimonialsCount > 1,
              },
              800: {
                  items: 2,
                  loop: testimonialsCount > 2,
                  nav: testimonialsCount > 2,
                  autoplay: testimonialsCount > 2,
              },
              1400: {
                  items: 3,
                  loop: testimonialsCount > 3,
                  nav: testimonialsCount > 3,
                  autoplay: testimonialsCount > 3,
              }
          }
      });
    }



    /*
     * Animate Numbers
     */
    $('.js-counter').numberAnimate({
        duration: 2000
    });


    /*
     * Tabs
     */
    function Tabs() {
      if(!document.querySelector('.faq-secondary')) {
        return;
      }

      const tabButtons = document.querySelectorAll('.tab-button');
      const tabContents = document.querySelectorAll('.tab-content');
      const selectTrigger = document.querySelector('.tab-select-trigger');
      const selectOptions = document.querySelector('.tab-select-options');
      const tabOptions = document.querySelectorAll('.tab-option');

      function activateTab(tabId) {
        tabContents.forEach(content =>
          content.classList.toggle('active', content.id === tabId)
        );

        tabButtons.forEach(button =>
          button.classList.toggle('active', button.dataset.tab === tabId)
        );

        selectTrigger.textContent = document.querySelector(
          `.tab-option[data-tab="${tabId}"]`
        ).textContent;
      }

      // Buttons click
      tabButtons.forEach(button => {
        button.addEventListener('click', () => {
          activateTab(button.dataset.tab);
        });
      });
    }

    Tabs();

});
