(function ($) {

  // Image Accordion
  $.fn.dnxte_image_accordion = function () {
      
    let $this = $(this);
    let accordion_type = $this.find('.dnxte_image_accordion_wrapper').data('accordion-type');
  
    let $accordion_children = $this.find('.dnxte_image_accordion_item');

    //Setup active on load
    $this.find('[data-active-on-load=1]').parents('.dnxte_image_accordion_item').addClass('dnxte-active');
    if (accordion_type === 'on_hover') {
        $accordion_children.mouseenter(function () {
            $accordion_children.removeClass('dnxte-active');
            $(this).addClass('dnxte-active');
        });

        $accordion_children.mouseleave(function () {
            $accordion_children.removeClass('dnxte-active');
        });
    }

    // Setup active on click
    if (accordion_type === 'on_click') {
        $this.addClass('dnxte_clickable');
        $accordion_children.click(function (e) {
            if ($(this).hasClass('dnxte-active')) {
                return;
            }
            $accordion_children.removeClass('dnxte-active');
            $(this).addClass('dnxte-active');
        });
    }
  };
  
  $(document).ready(function($) {
    "use strict";

    const $grid = $(".dnxte-msnary-grid");

    if ($grid.length) {
      $(".dnxte-grid").imagesLoaded(() => {
        $grid.masonry({
          itemSelector: ".dnxte-msnary-item",
          percentPosition: true,
          columnWidth:".grid-sizer",
          gutter:".gutter-sizer",
          stagger: 0,
          transitionDuration: 90,
          percentPosition: true,
        });
      });
    }

    const img = $(".image-link");

    if (img.length) {
      img.each(function () {
        img.magnificPopup({
          removalDelay: 500,
          type: "image",
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            tCounter: '%curr% of %total%' // Markup for "1 of 7" counter
          },
          image: {
            titleSrc: function (item) {
              return item.el.attr('data-title') + item.el.attr('data-caption');
            }
          },
          zoom: {
            enabled: true, 
            duration: 500,
            opener: function(element) {
                return element.find('img');
            }
          },
          // mainClass: 'mfp-fade',
          // autoFocusLast: false,
        });
      })
    }

    $('.dnxte-magnifier img').each(function() {
      const magnifyData = $(this).data();
      $(this).magnify({
        speed: +magnifyData.speed,
        limitBounds: magnifyData.boundary === "on"
      })
    })

    $(document).ready(function () {
      $(".dnxte_image_accordion").each(function () {
          $(this).dnxte_image_accordion();
      });
  });
  });

  
  // WOW ANIMATION
  wow = new WOW({
    animateClass: "animated",
    offset: 50,
  });
  wow.init();
})(jQuery);
