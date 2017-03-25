(function ($) {

    /* ================= Configure functions  =================  */

    // Enhance Contact Form 7 plugin behavior to fit theme design.
    function cf7_extra() {
        // Hide status message by click.
        $('.wpcf7-response-output').on('click', function () {
            $(this).hide(300);
        });

        // Hide notifications by click.
        $('.wpcf7-form-control-wrap').each(function () {
            $(this).on('click', function () {
                $(this).find('.wpcf7-form-control').focus().next().remove();
            })
        })
    }

    cf7_extra();

    // Youtube video close after finish.
    function onPlayerStateChange(event) {
        switch (event.data) {
            case YT.PlayerState.ENDED:
                $.magnificPopup.close();
                break;
        }
    }

    // Show drop down on first menu click.
    function preventMenuAction() {
        if ($(window).width() > 767) {
            $('.touch .menu-item-has-children > a').one('click', function (e) {
                e.preventDefault();
            })
        }
    }

    preventMenuAction();

    /**
     * Disable auto scroll for location map.
     */
    function preventGoogleMapScroll() {
        var map_wrapper = $('.block-map');
        $('.block-map iframe').addClass('scrolloff');
        map_wrapper.on('click', function () {
            $('.block-map iframe').removeClass('scrolloff'); // set the pointer events true on click
        });
        map_wrapper.mouseleave(function () {
            $('.block-map iframe').addClass('scrolloff');
        });
    }

    preventGoogleMapScroll();

    // Accordion for tabs.
    function tabs_accordion() {
        // Keep first tab open by default.
        $('.accordion .item:eq(0)').addClass('act').find('.wrap-info').slideToggle(300);
        // Toggle on click.
        $('.accordion .title').on('click', function () {
            // Show/hide clicked tab.
            $(this).parent().toggleClass('act').find('.wrap-info').slideToggle(300);
            // Collapse neighbor tabs.
            $(this).parent().siblings().removeClass('act').find('.wrap-info').slideUp(300);
        });
    }

    //tabs_accordion();

    // Show secondary header on page scroll.
    function stickyHeader() {
        var header_offset = $('.site-header').height() + 30;
        $(window).scroll(function () {
            if ($(window).scrollTop() > header_offset && !(
                    $('.site-header').hasClass('sticky')
                )) {
                $('.site-header').addClass('sticky');
            }
            else {
                if ($(window).scrollTop() < header_offset) {
                    $('.site-header').removeClass('sticky');
                }
            }

        });
    }

    stickyHeader();

    $(document).ready(function () {

        /* ================= Custom theme scripts  =================  */

        // Titles structure for decor styling.
        /*$('h2,h3,h4').each(function () {
         $(this).wrapInner('<span></span>');
         });*/

        // Need wrapper to center title text
        $('.title-text').wrap('<span class="title-text-wrap"></span>');

        // Popup form.
        $('a[href="#popup-form"]').magnificPopup({
            type: 'inline',
            preloader: false,
            focus: '#name',

            // When elemened is focused, some mobile browsers in some cases zoom in
            // It looks not nice, so we disable it:
            callbacks: {
                beforeOpen: function () {
                    if ($(window).width() < 700) {
                        this.st.focus = false;
                    } else {
                        this.st.focus = '#name';
                    }
                }
            }
        });

        /* ================= Initialize external plugins  ================ */

        // Images gallery.
        $(".gallery").magnificPopup({
            delegate: 'a.item',
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        // News carousel.
        $('.home .news-blocks').owlCarousel({
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                768: {
                    items: 3
                }
            },
            lazyLoad: true,
            dots: true,
            nav: true,
            rewind: false,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            loop: true
        });

        // Testimonials carousel.
        $('.home .logo-items').owlCarousel({
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                768: {
                    items: 3
                }
            },
            lazyLoad: true,
            dots: true,
            nav: true,
            rewind: false,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            loop: true,
            //stagePadding: 30,
            //smartSpeed: 450
            //animateIn: 'slideInUp',
            //animateOut: 'slideInDown'
        });

        // On scroll animations.
        var wow = new WOW(
            {
                boxClass: 'wow',      // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset: 100,          // distance to the element when triggering the animation (default is 0)
                mobile: false,       // trigger animations on mobile devices (default is true)
                live: true,       // act on asynchronously loaded content (default is true)
                callback: function (box) {
                    // the callback is fired every time an animation is started
                    // the argument that is passed in is the DOM node being animated
                },
                scrollContainer: null // optional scroll container selector, otherwise use window
            }
        );
        wow.init();

        // Equal height for blocks.
        $('.match, .row-content-bottom .block, .featured-blocks .block .text, .red-icons .block .text, ul.products .product_item_title').matchHeight();
        $('ul.products .custom-attributes').matchHeight();

        // Scripts for mobile devices.
        if ($(window).width() < 768) {
            // Mobile menu.
            $('nav#menu_mobile').mmenu();

        }
        // Scripts for non mobile
        else {

            // Default Menu dropdown.
            $('.nav-primary ul.main-menu').superfish({
                animation: false,
                animationOut: false
            });

            // Forbid click event for phone links
            $('a[href^="tel:"]').on('click', function (e) {
                e.preventDefault();
            });

        }

    });


    $(window).load(function () {
        $('body').addClass('loaded');
        // Hide touch indicator.
        setTimeout(function () {
            $('.flexslider .touch-indicator').addClass('disabled');
        }, 4500);
    });

    // Window resize
    $(window).resize(function () {
    });

    // Window scroll actions.
    $(window).scroll(function () {

    });


    // Orientation change
    /*window.addEventListener("orientationchange", function () {
     });*/

})(jQuery);
