(function($){

    $(document).ready(function() {

        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        /* ~~~~~~~~~~ Plugin Inits ~~~~~~~~~~ */
        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

            /* ~~~~~~~~~~ Match height ~~~~~~~~~~ */

            $('.match-height').matchHeight({
                byRow: true,
                property: 'min-height',
                target: null,
                remove: false
            });


            /* ~~~~~~~~~~ Select2 ~~~~~~~~~~ */

            $('select').select2();


            /* ~~~~~~~~~~ Retina init ~~~~~~~~~~ */

            retinajs();


            /* ~~~~~~~~~~ Mobile navigation ~~~~~~~~~~ */

            $('.main-header').addClass('mmenu-fixed');

            if($('#wpadminbar').length) {
                $('#wpadminbar').addClass('mmenu-fixed');
            }

            var $menu = $("#mobile-navigation").mmenu({
                "extensions": [
                    "pagedim-black",
                    "theme-dark"
                ],
                "offCanvas": {
                    "position": "right"
                },
                "navbars": [
                    {
                        "position": "top"
                    }
                ]
            }, {
                classNames: {
                    fixedElements: {
                        fixed: "mmenu-fixed",
                        elemInsertSelector: '.main-content'
                    }
                }
            });

            var $icon = $("#mmenu-triger");
            var API = $menu.data( "mmenu" );

            $icon.on( "click", function() {
                if($icon.hasClass('is-active')) {
                    API.close();
                } else {
                    API.open();
                }
            });

            API.bind( "opened", function() {
               setTimeout(function() {
                  $icon.addClass( "is-active" );
               }, 10);
            });
            API.bind( "closed", function() {
               setTimeout(function() {
                  $icon.removeClass( "is-active" );
               }, 10);
            });


            /* ~~~~~~~~~~ Lazy Loading ~~~~~~~~~~ */

            $('.lazy').Lazy();


            /* ~~~~~~~~~~ Parallax opacity intro ~~~~~~~~~~ */

            $(window).scroll(function(e){
              opacity();
            });

            function opacity(){
              var scrolled = $(window).scrollTop();
              $('.intro__logo, .intro__title').css('opacity',1-(scrolled*0.002));
              $('.hello-section__title, .hello-section__subtitle').css('opacity',1-(scrolled*0.002));
            }


            /* ~~~~~~~~~~ OWL Carousel ~~~~~~~~~~ */

            var owlTestimonialsSlider = $('.why-us__testimonials__slider');
            owlTestimonialsSlider.owlCarousel({
                nav:true,
                loop: true,
                dots: false,
                items: 1
            });

            var owlHomeSlider = $('.intro__background-carousel, .hello-section__background-carousel');
            owlHomeSlider.owlCarousel({
                nav: false,
                loop: true,
                dots: false,
                items: 1,
                autoplay:true,
                autoplayTimeout:5000,
                mouseDrag: false,
                touchDrag: false,
                pullDrag: false,
                freeDrag: false,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut'
            });

            var owlPartnersSection = $('.partners__carousel');
            owlPartnersSection.owlCarousel({
                loop: false,
                margin: 15,
                lazyLoad: true,
                dots: false,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                responsiveClass: true,
                responsiveRefreshRate: true,
                responsive : {
                    0 : {
                        items: 2
                    },
                    576 : {
                        items: 3
                    },
                    // 768 : {
                    //     items: 4
                    // },
                    992 : {
                        items: 6
                    }
                }
            });

            var owlGallerySection = $('.single-camp__gallery');
            owlGallerySection.owlCarousel({
                loop: true,
                margin: 30,
                lazyLoad: true,
                nav:true,
                dots: false,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                responsiveClass: true,
                responsiveRefreshRate: true,
                responsive : {
                    0 : {
                        items: 2
                    },
                    768 : {
                        items: 3
                    }
                }
            });

            var owlRegionsSlider = $('.country-gallery');
            owlRegionsSlider.owlCarousel({
                nav:true,
                margin: 15,
                dots: true,
                lazyLoad: true,
                loop: true,
                items: 1
            });

            var owlNewsSlider = $('.latest-news__carousel');
            owlNewsSlider.owlCarousel({
                lazyLoad: true,
                margin: 30,
                loop: true,
                dots: false,
                items: 1,
                responsiveClass: true,
                responsiveRefreshRate: true,
                responsive : {
                    0 : {
                        autoplay:true,
                        autoplayTimeout:3000,
                        autoplayHoverPause:true,
                        nav:false
                    },
                    992 : {
                        autoplay:false,
                        nav:true
                    }
                }
            });


            var owlHighlightsSlider = $('.taxonomy-destinations-page #myTab');
            owlHighlightsSlider.owlCarousel({
                nav:true,
                margin: 3,
                dots: false,
                lazyLoad: true,
                loop: false,
                items: 4
            });


            /* ~~~~~~~~~~ MixitUp ~~~~~~~~~~ */

            if($('#mixitup-camps').length) {

                var campsMixer = mixitup('#mixitup-camps', {
                    load: {
                        filter: 'all'
                    },
                    selectors: {
                        control: '.mixitup-control'
                    },
                    pagination: {
                        limit: 6,
                        maintainActivePage: false,
                        loop: true,
                        hidePageListIfSinglePage: true
                    },
                    callbacks: {
                        onMixEnd: function() {
                            jQuery(window).trigger('resize').trigger('scroll');
                        }
                    }
                });
            }

            if($('#mixitup-camps-villas').length) {

                var campsVillasMixer = mixitup('#mixitup-camps-villas', {
                    load: {
                        filter: 'all'
                    },
                    selectors: {
                        control: '.mixitup-control'
                    },
                    pagination: {
                        limit: 18,
                        maintainActivePage: false,
                        loop: true,
                        hidePageListIfSinglePage: true
                    },
                    callbacks: {
                        onMixEnd: function() {
                            jQuery(window).trigger('resize').trigger('scroll');
                        }
                    }
                });
            }

            if($('#mixitup-posts-from-past').length) {

                var postMixer = mixitup('#mixitup-posts-from-past', {
                    load: {
                        filter: 'all'
                    },
                    selectors: {
                        control: '.mixitup-control'
                    },
                    pagination: {
                        limit: 6,
                        maintainActivePage: false,
                        loop: true,
                        hidePageListIfSinglePage: true
                    },
                    callbacks: {
                        onMixEnd: function() {
                            jQuery(window).trigger('resize').trigger('scroll');
                        }
                    }
                });
            }


            /* ~~~~~~~~~~ Sticky ~~~~~~~~~~ */

            $(".about__sidebar").stick_in_parent({
                offset_top: 110
            });


        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        /* ~~~~~~~~~~ Functions ~~~~~~~~~~ */
        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

            /* ~~~~~~~~~~ Modal fix ~~~~~~~~~~ */

            $('.modal').insertAfter($('body'));


            /* ~~~~~~~~~~ Set animation scroll when URL is with #anchor and make smooth scroll ~~~~~~~~~~ */

            $(function(){
                if ( window.location.hash ) scroll(0,0);
                setTimeout( function() { scroll(0,0); }, 1);

                var headerHeight = 68;

                if($('#wpadminbar').length) {
                    headerHeight += $('#wpadminbar').height();
                }

                $('.scroll').on('click', function(e) {
                    e.preventDefault();

                    $('html, body').animate({
                        scrollTop: ($($(this).attr('href')).offset().top - headerHeight) + 'px'
                    }, 1000, 'swing');
                });

                if(window.location.hash) {
                    $('html, body').animate({
                        scrollTop: ($(window.location.hash).offset().top - headerHeight) + 'px'
                    }, 1000, 'swing');
                }
            });


            /* ~~~~~~~~~~ Return to top button ~~~~~~~~~~ */

            $(window).scroll(function() {
                if ($(this).scrollTop() >= 100) {
                    $('.return-to-top').addClass('return-to-top--visible');
                } else {
                    $('.return-to-top').removeClass('return-to-top--visible');
                }
            });

            $('#return-to-top').click(function() {
                $('body,html').animate({
                    scrollTop : 0
                }, 500);
            });


            /* ~~~~~~~~~~ First content element fix ~~~~~~~~~~ */

            $('.content').prepend('<span class="first-element-fix"></span>');
            $('blockquote').prepend('<span class="first-element-fix"></span>');
            $('.panel').prepend('<span class="first-element-fix"></span>');


            /* ~~~~~~~~~~ Mobile navigation ~~~~~~~~~~ */

            $('#mobile-navigation .navigation li a').addClass('mm-fullsubopen');


            /* ~~~~~~~~~~ Make dropdowns visible on hover ~~~~~~~~~~ */

            $('ul.navbar-nav li.dropdown').hover(function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn();
            }, function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut();
            });


            /* ~~~~~~~~~~ Delete empty <p> elements ~~~~~~~~~~~ */

            $('p').each(function() {
                var $this = $(this);
                if($this.html().replace(/\s|&nbsp;/g, '').length === 0)
                    $this.remove();
            });


            /* ~~~~~~~~~~ Change navigation after scroll ~~~~~~~~~~ */

            $(window).scroll(function() {
                if ($(this).scrollTop() >= 100) {
                    $('.main-header').addClass('main-header--scrolled');
                } else {
                    $('.main-header').removeClass('main-header--scrolled');
                }
            });


            /* ~~~~~~~~~~ Replace all SVG images with inline SVG ~~~~~~~~~~ */

            jQuery('img.svg').each(function(){
                var $img = jQuery(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');

                jQuery.get(imgURL, function(data) {
                    var $svg = jQuery(data).find('svg');

                    if(typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }

                    if(typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass+' replaced-svg');
                    }

                    $svg = $svg.removeAttr('xmlns:a');
                    $img.replaceWith($svg);
                }, 'xml');
            });


            /* ~~~~~~~~~~ Collapse Options ~~~~~~~~~~ */

            $('.expanded-content-collapse-button').on('click', function() {
                $(this).hide();
            });

            /* ~~~~~~~~~~ Search overlay ~~~~~~~~~~ */

            if($('#search-overlay').length) {
                var $overlay = $('#search-overlay');
                $('.search-overlay-trigger').click(function(){
                    if ( $overlay.is(':visible') ) {
                        $overlay.fadeOut();
                        $('.main-header').removeClass('main-header--hidden');
                    } else {
                        $overlay.fadeIn();
                        $('.main-header').addClass('main-header--hidden');
                    }
                });

                $('#close-search-overlay').click(function(){
                    $overlay.fadeOut();
                    $('.main-header').removeClass('main-header--hidden');
                });
            }


            /* ~~~~~~~~~~ Newsletter overlay ~~~~~~~~~~ */

            if($('#newsletter-overlay').length) {
                var $overlay1 = $('#newsletter-overlay');
                $('.newsletter__button').click(function(){
                    if ( $overlay1.is(':visible') ) {
                        $overlay1.fadeOut();
                         $('.main-header').removeClass('main-header--hidden');
                    } else {
                        $overlay1.fadeIn();
                        $('.main-header').addClass('main-header--hidden');
                    }
                });

                $('#close-newsletter-overlay').click(function(){
                    $overlay1.fadeOut();
                     $('.main-header').removeClass('main-header--hidden');
                });
            }


            /* ~~~~~~~~~~ Fix Parallax after Tab Open ~~~~~~~~~~ */

            $('#accordion').on('shown.bs.collapse', function () {
                jQuery(window).trigger('resize').trigger('scroll');
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
                jQuery(window).trigger('resize').trigger('scroll');
            });


            /* ~~~~~~~~~~ Load more post ~~~~~~~~~~~ */

            $(document).ready(function () {
                size_li = $("#where-go .col-md-4").size();
                y=6;
                x=3;
                $('#where-go .col-md-4:lt('+y+')').show();
                $('#loadMore').click(function () {
                    x= (x+3 <= size_li) ? x+3 : size_li;
                    $('#where-go .col-md-4:lt('+x+')').show();

                    if (x >= size_li) {
                        $("#loadMore").removeClass('visible');
                    }

                    jQuery(window).trigger('resize').trigger('scroll');
                });
            });


            /* ~~~~~~~~~~ Scroll after open tab ~~~~~~~~~~ */

            $('.page-links #accordion').on('shown.bs.collapse', function() {

                var item = $('#accordion .card>.show');
                var headerHeight = $('.main-header').outerHeight();

                $('html, body').animate({
                    scrollTop: $(item).offset().top-headerHeight
                }, 'slow');
            });

            $('#myTab .nav-link').on('click', function() {
                var item = $(".page-links-content .tab-content");
                var headerHeight = $('.main-header').height();

                $('html, body').animate({
                    scrollTop: $(item).offset().top-headerHeight
                }, 'slow');
            });


            /* ~~~~~~~~~~ Fix bug open Tabs in tabs ~~~~~~~~~~ */

            $('#myTab').on('click', 'a[data-toggle="tab"]', function(e) {
              e.preventDefault();

              var $link = $(this);

              if (!$link.hasClass('active')) {

                //remove active class from other tab-panes
                $('.tab-content:not(.' + $link.attr('href').replace('#','') + ') .tab-pane').removeClass('show active');

                $('a[data-toggle="tab"]').removeClass('active');

                // click first submenu tab for active section
                $('a[href="' + $link.attr('href') + '_all"][data-toggle="tab"]').click();

                // activate tab-pane for active section
                $('.tab-content.' + $link.attr('href').replace('#','') + ' .tab-pane:first').addClass('show active');
              }
            });

            $('#myTab').on('click', 'a.nav-link--where', function(e) {
                e.preventDefault();

                $("#world-map-desktop path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                $("#on-desktop-map-africa path").css("fill", '#dcb070').css("stroke", '#dcb070');
                $('#myMapTab a[href="#map-africa-desktop"]').tab('show');

            });


            /* ~~~~~~~~~~ Add Before and After for Input button ~~~~~~~~~~ */

            $('.newsletter-overlay input[type="submit"]').replaceWith('<button id="submit" type="submit" class="btn icon">' + $('.newsletter-overlay input[type="submit"]').val() +'</button>');


            /* ~~~~~~~~~~ Show newsletter ~~~~~~~~~~ */

            $(function() {

                //copyright JGA 2013 under MIT License
                var monster={set:function(e,t,n,r){var i=new Date,s="",o=typeof t,u="";r=r||"/",n&&(i.setTime(i.getTime()+n*24*60*60*1e3),s="; expires="+i.toGMTString());if(o==="object"&&o!=="undefined"){if(!("JSON"in window))throw"Bummer, your browser doesn't support JSON parsing.";u=JSON.stringify({v:t})}else u=escape(t);document.cookie=e+"="+u+s+"; path="+r},get:function(e){var t=e+"=",n=document.cookie.split(";"),r="",i="",s={};for(var o=0;o<n.length;o++){var u=n[o];while(u.charAt(0)==" ")u=u.substring(1,u.length);if(u.indexOf(t)===0){r=u.substring(t.length,u.length),i=r.substring(0,1);if(i=="{"){s=JSON.parse(r);if("v"in s)return s.v}return r=="undefined"?undefined:unescape(r)}}return null},remove:function(e){this.set(e,"",-1)},increment:function(e,t){var n=this.get(e)||0;this.set(e,parseInt(n,10)+1,t)},decrement:function(e,t){var n=this.get(e)||0;this.set(e,parseInt(n,10)-1,t)}};

                if (monster.get('cookieinfo') === 'true') {
                    return false;
                }


                    $("#newsletter-bar").delay(15000).fadeIn();
                    $('.main-footer').delay(15000).addClass('main-footer--padding');
                    localStorage.setItem('popState','shown')


                $('#popup-close').click(function(e) {
                    $('#newsletter-bar').fadeOut(); // Now the pop up is hiden.
                    $('.main-footer').removeClass('main-footer--padding');
                    monster.set('cookieinfo', 'true', 365);
                });
            });


            /* ~~~~~~~~~~ Intro parallax ~~~~~~~~~~ */

            $(window).scroll(function() {
                var windowHeight = $(window).height();

                if ($(this).scrollTop() >= windowHeight) {
                    $('.intro, .hello-section').addClass('no-visible');
                } else {
                    $('.intro, .hello-section').removeClass('no-visible');
                }
            });


            /* ~~~~~~~~~~ Hidden excerpt after open collapse ~~~~~~~~~~ */

            $('#more-facts').on('click', function() {
                $('.facts__content--excerpt').addClass('d-none');
            });

    });


    $(window).bind('load resize orientationChange', function () {

        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        /* ~~~~~~~~~~ Functions ~~~~~~~~~~ */
        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

            /* ~~~~~~~~~~ AOS Refresh ~~~~~~~~~~ */

            // AOS.refresh();


            /* ~~~~~~~~~~ Bootstrap modal margin top if WP admin exist ~~~~~~~~~~ */

            if($('#wpadminbar').length) {
                $('.modal').on('shown.bs.modal', function (e) {
                    var modalHeight = $(this).find('.modal-content').height();
                    var WPAdminBarHeight = $('#wpadminbar').height();

                    if(modalHeight >= $(window).height()) {
                        $('.modal .vertical-alignment-helper').css("padding-top", (WPAdminBarHeight + 15));
                    } else {
                        $('.modal .vertical-alignment-helper').css("padding-top", 15);
                    }
                });
            }


            /* ~~~~~~~~~~ Sticky Footer ~~~~~~~~~~ */

            $(function(){
                var $footer = $('.footer-wrapper');

                var pos = $footer.position(),
                    height = ($(window).outerHeight() - pos.top) - ($footer.outerHeight() + 2);

                if (height > 0) {
                    $footer.css('margin-top', height);
                }
            });

            setTimeout(function() {

                    if($('#world-map-desktop').length) {
	                    
                        $("#on-desktop-map-australia").click(function(){
                            //$("#world-map-desktop path.cls-1").css("fill", '#8a8a8a').css("stroke", '#9e9e9e');
                            $("#on-desktop-map-australia path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $("#world-map-desktop a path.cls-1").css("fill", '#007bff').css("stroke", '#9e9e9e');

                            $('#myMapTab a[href="#map-australasia-desktop"]').tab('show');
                        });

                        $("#on-desktop-map-south-east-asia").click(function(){
                            $("#world-map-desktop path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-desktop-map-south-east-asia path").css("fill", '#dcb070').css("stroke", '#dcb070');

                            $('#myMapTab a[href="#map-south-east-asia-desktop"]').tab('show');
                        });

                        $("#on-desktop-map-africa").click(function(){
                            $("#world-map-desktop path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-desktop-map-africa path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTab a[href="#map-africa-desktop"]').tab('show');
                        });

                        $("#on-desktop-map-arabia").click(function(){
                            $("#world-map-desktop path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-desktop-map-arabia path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTab a[href="#map-arabia-desktop"]').tab('show');
                        });

                        $("#on-desktop-map-indian-ocean").click(function(){
                            $("#world-map-desktop path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $('#myMapTab a[href="#map-indian-ocean-desktop"]').tab('show');
                        });

                        $("#on-desktop-map-india-beyond").click(function(){
                            $("#world-map-desktop path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-desktop-map-india-beyond path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTab a[href="#map-india-beyond-desktop"]').tab('show');
                        });

                        $("#on-desktop-map-latin-america").click(function(){
                            $("#world-map-desktop path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-desktop-map-latin-america path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTab a[href="#map-latin-america-desktop"]').tab('show');
                        });
                    }

                    if($('#world-map-mobile').length) {

                        $("#on-mobile-map-south-east-asia").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-south-east-asia path").css("fill", '#dcb070').css("stroke", '#dcb070');

                            $('#myMapTabNone a[href="#map-south-east-asia-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-australia").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-australia path").css("fill", '#dcb070').css("stroke", '#dcb070');

                            $('#myMapTabNone a[href="#map-australasia-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-africa").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-africa path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTabNone a[href="#map-africa-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-arabia").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-arabia path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTabNone a[href="#map-arabia-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-indian-ocean").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $('#myMapTabNone a[href="#map-indian-ocean-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-india-beyond").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-india-beyond path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTabNone a[href="#map-india-beyond-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-latin-america").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-latin-america path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTabNone a[href="#map-latin-america-mobile"]').tab('show');
                        });


                }

                if($('.taxonomy-destinations-page #map__latin-america').length) {

                    if($('.country-brazil.active').length) {
                        $("#map__latin-america #BR").css("fill", '#dcb070');
                    } else {
                        $(".country-brazil").hover(function(){
                            $("#map__latin-america #BR").css("fill", '#dcb070');
                        }, function() {
                            $("#map__latin-america #BR").css("fill", '#939191');
                        });
                    }
                    $("#map__latin-america #BR").hover(function(){
                        $(".country-brazil").css("color", '#dcb070');
                    }, function() {
                        $(".country-brazil").css("color", '#ebebeb');
                    });
                }

                if($('.taxonomy-destinations-page #map__indian-ocean').length) {

                    if($('.country-maldives.active').length) {
                        $("#map__indian-ocean #MLD .st0").css("stroke", '#dcb070');
                        $("#map__indian-ocean #MLD .st0").css("fill", '#dcb070');
                    } else {
                        $(".country-maldives").hover(function(){
                            $("#map__indian-ocean #MLD .st0").css("stroke", '#dcb070');
                            $("#map__indian-ocean #MLD .st0").css("fill", '#dcb070');
                        }, function() {
                            $("#map__indian-ocean #MLD .st0").css("stroke", '#939191');
                            $("#map__indian-ocean #MLD .st0").css("fill", '#939191');
                        });
                    }
                    $("#map__indian-ocean #MLD").hover(function(){
                        $(".country-maldives").css("color", '#dcb070');
                    }, function() {
                        $(".country-maldives").css("color", '#ebebeb');
                    });

                    if($('.country-seychelles.active').length) {
                        $("#map__indian-ocean #SCH .st0").css("stroke", '#dcb070');
                        $("#map__indian-ocean #SCH .st0").css("fill", '#dcb070');
                    } else {
                        $(".country-seychelles").hover(function(){
                            $("#map__indian-ocean #SCH .st0").css("stroke", '#dcb070');
                            $("#map__indian-ocean #SCH .st0").css("fill", '#dcb070');
                        }, function() {
                            $("#map__indian-ocean #SCH .st0").css("stroke", '#939191');
                            $("#map__indian-ocean #SCH .st0").css("fill", '#939191');
                        });
                    }
                    $("#map__indian-ocean #SCH").hover(function(){
                        $(".country-seychelles").css("color", '#dcb070');
                    }, function() {
                        $(".country-seychelles").css("color", '#ebebeb');
                    });

                    if($('.country-mauritius.active').length) {
                        $("#map__indian-ocean #MRT-p .st0").css("stroke", '#dcb070');
                        $("#map__indian-ocean #MRT-p .st0").css("fill", '#dcb070');
                    } else {
                        $(".country-mauritius").hover(function(){
                            $("#map__indian-ocean #MRT-p .st0").css("stroke", '#dcb070');
                            $("#map__indian-ocean #MRT-p .st0").css("fill", '#dcb070');
                        }, function() {
                            $("#map__indian-ocean #MRT-p .st0").css("stroke", '#939191');
                            $("#map__indian-ocean #MRT-p .st0").css("fill", '#939191');
                        });
                    }
                    $("#map__indian-ocean #MRT-p").hover(function(){
                        $(".country-mauritius").css("color", '#dcb070');
                    }, function() {
                        $(".country-mauritius").css("color", '#ebebeb');
                    });
                }

                if($('.taxonomy-destinations-page #map__australia').length) {

                    if($('.country-northern-territory.active').length) {
                        $("#map__australia #AUSN").css("fill", '#dcb070');
                    } else {
                        $(".country-northern-territory").hover(function(){
                            $("#map__australia #AUSN").css("fill", '#dcb070');
                        }, function() {
                            $("#map__australia #AUSN").css("fill", '#939191');
                        });
                    }
                    $("#map__australia #AUSN").hover(function(){
                        $(".country-northern-territory").css("color", '#dcb070');
                    }, function() {
                        $(".country-northern-territory").css("color", '#ebebeb');
                    });

                    if($('.country-western-australia.active').length) {
                        $("#map__australia #AUSW").css("fill", '#dcb070');
                    } else {
                        $(".country-western-australia").hover(function(){
                            $("#map__australia #AUSW").css("fill", '#dcb070');
                        }, function() {
                            $("#map__australia #AUSW").css("fill", '#939191');
                        });
                    }
                    $("#map__australia #AUSW").hover(function(){
                        $(".country-western-australia").css("color", '#dcb070');
                    }, function() {
                        $(".country-western-australia").css("color", '#ebebeb');
                    });

                    if($('.country-new-south-wales.active').length) {
                        $("#map__australia #AUSNE").css("fill", '#dcb070');
                    } else {
                        $(".country-new-south-wales").hover(function(){
                            $("#map__australia #AUSNE").css("fill", '#dcb070');
                        }, function() {
                            $("#map__australia #AUSNE").css("fill", '#939191');
                        });
                    }
                    $("#map__australia #AUSNE").hover(function(){
                        $(".country-new-south-wales").css("color", '#dcb070');
                    }, function() {
                        $(".country-new-south-wales").css("color", '#ebebeb');
                    });

                    if($('.country-south-australia.active').length) {
                        $("#map__australia #AUSS").css("fill", '#dcb070');
                    } else {
                        $(".country-south-australia").hover(function(){
                            $("#map__australia #AUSS").css("fill", '#dcb070');
                        }, function() {
                            $("#map__australia #AUSS").css("fill", '#939191');
                        });
                    }
                    $("#map__australia #AUSS").hover(function(){
                        $(".country-south-australia").css("color", '#dcb070');
                    }, function() {
                        $(".country-south-australia").css("color", '#ebebeb');
                    });

                    if($('.country-victoria.active').length) {
                        $("#map__australia #AUSV").css("fill", '#dcb070');
                    } else {
                        $(".country-victoria").hover(function(){
                            $("#map__australia #AUSV").css("fill", '#dcb070');
                        }, function() {
                            $("#map__australia #AUSV").css("fill", '#939191');
                        });
                    }
                    $("#map__australia #AUSV").hover(function(){
                        $(".country-victoria").css("color", '#dcb070');
                    }, function() {
                        $(".country-victoria").css("color", '#ebebeb');
                    });

                    if($('.country-queensland.active').length) {
                        $("#map__australia #AUSQ").css("fill", '#dcb070');
                    } else {
                        $(".country-queensland").hover(function(){
                            $("#map__australia #AUSQ").css("fill", '#dcb070');
                        }, function() {
                            $("#map__australia #AUSQ").css("fill", '#939191');
                        });
                    }
                    $("#map__australia #AUSQ").hover(function(){
                        $(".country-queensland").css("color", '#dcb070');
                    }, function() {
                        $(".country-queensland").css("color", '#ebebeb');
                    });

                    if($('.country-tasmania.active').length) {
                        $("#map__australia #AUST").css("fill", '#dcb070');
                    } else {
                        $(".country-tasmania").hover(function(){
                            $("#map__australia #AUST").css("fill", '#dcb070');
                        }, function() {
                            $("#map__australia #AUST").css("fill", '#939191');
                        });
                    }
                    $("#map__australia #AUST").hover(function(){
                        $(".country-tasmania").css("color", '#dcb070');
                    }, function() {
                        $(".country-tasmania").css("color", '#ebebeb');
                    });
                }

                if($('.taxonomy-destinations-page #map__australasia').length) {

                    if($('.country-australia.active').length) {
                        $("#map__australasia #AU").css("fill", '#dcb070');
                    } else {
                        $(".country-australia").hover(function(){
                            $("#map__australasia #AU").css("fill", '#dcb070');
                        }, function() {
                            $("#map__australasia #AU").css("fill", '#939191');
                        });
                    }
                    $("#map__australasia #AU").hover(function(){
                        $(".country-australia").css("color", '#dcb070');
                    }, function() {
                        $(".country-australia").css("color", '#ebebeb');
                    });

                    if($('.country-new-zealand.active').length) {
                        $("#map__australasia #NZ").css("fill", '#dcb070');
                    } else {
                        $(".country-new-zealand").hover(function(){
                            $("#map__australasia #NZ").css("fill", '#dcb070');
                        }, function() {
                            $("#map__australasia #NZ").css("fill", '#939191');
                        });
                    }
                    $("#map__australasia #NZ").hover(function(){
                        $(".country-new-zealand").css("color", '#dcb070');
                    }, function() {
                        $(".country-new-zealand").css("color", '#ebebeb');
                    });

                    if($('.country-papua-new-guinea.active').length) {
                        $("#map__australasia #PG").css("fill", '#dcb070');
                    } else {
                        $(".country-papua-new-guinea").hover(function(){
                            $("#map__australasia #PG").css("fill", '#dcb070');
                        }, function() {
                            $("#map__australasia #PG").css("fill", '#939191');
                        });
                    }
                    $("#map__australasia #PG").hover(function(){
                        $(".country-papua-new-guinea").css("color", '#dcb070');
                    }, function() {
                        $(".country-papua-new-guinea").css("color", '#ebebeb');
                    });
                }

                if($('.taxonomy-destinations-page #map__arabia').length) {

                    if($('.country-jordan.active').length) {
                        $("#map__arabia #JO").css("fill", '#dcb070');
                    } else {
                        $(".country-jordan").hover(function(){
                            $("#map__arabia #JO").css("fill", '#dcb070');
                        }, function() {
                            $("#map__arabia #JO").css("fill", '#939191');
                        });
                    }
                    $("#map__arabia #JO").hover(function(){
                        $(".country-jordan").css("color", '#dcb070');
                    }, function() {
                        $(".country-jordan").css("color", '#ebebeb');
                    });

                    if($('.country-united-arab-emirates.active').length) {
                        $("#map__arabia #AE").css("fill", '#dcb070');
                    } else {
                        $(".country-united-arab-emirates").hover(function(){
                            $("#map__arabia #AE").css("fill", '#dcb070');
                        }, function() {
                            $("#map__arabia #AE").css("fill", '#939191');
                        });
                    }
                    $("#map__arabia #AE").hover(function(){
                        $(".country-united-arab-emirates").css("color", '#dcb070');
                    }, function() {
                        $(".country-united-arab-emirates").css("color", '#ebebeb');
                    });

                    if($('.country-oman.active').length) {
                        $("#map__arabia #OM").css("fill", '#dcb070');
                    } else {
                        $(".country-oman").hover(function(){
                            $("#map__arabia #OM").css("fill", '#dcb070');
                        }, function() {
                            $("#map__arabia #OM").css("fill", '#939191');
                        });
                    }
                    $("#map__arabia #OM").hover(function(){
                        $(".country-oman").css("color", '#dcb070');
                    }, function() {
                        $(".country-oman").css("color", '#ebebeb');
                    });
                }

                if($('.taxonomy-destinations-page #map__india-beyond').length) {

                    if($('.country-bhutan.active').length) {
                        $("#map__india-beyond #BT").css("fill", '#dcb070');
                    } else {
                        $(".country-bhutan").hover(function(){
                            $("#map__india-beyond #BT").css("fill", '#dcb070');
                        }, function() {
                            $("#map__india-beyond #BT").css("fill", '#939191');
                        });
                    }
                    $("#map__india-beyond #BT").hover(function(){
                        $(".country-bhutan").css("color", '#dcb070');
                    }, function() {
                        $(".country-bhutan").css("color", '#ebebeb');
                    });

                    if($('.country-india.active').length) {
                        $("#map__india-beyond #IN, #map__india-beyond #KA").css("fill", '#dcb070');
                    } else {
                        $(".country-india").hover(function(){
                            $("#map__india-beyond #IN, #map__india-beyond #KA").css("fill", '#dcb070');
                        }, function() {
                            $("#map__india-beyond #IN, #map__india-beyond #KA").css("fill", '#939191');
                        });
                    }
                    $("#map__india-beyond #IN, #map__india-beyond #KA").hover(function(){
                        $(".country-india").css("color", '#dcb070');
                    }, function() {
                        $(".country-india").css("color", '#ebebeb');
                    });

                    if($('.country-sri-lanka.active').length) {
                        $("#map__india-beyond #LK").css("fill", '#dcb070');
                    } else {
                        $(".country-sri-lanka").hover(function(){
                            $("#map__india-beyond #LK").css("fill", '#dcb070');
                        }, function() {
                            $("#map__india-beyond #LK").css("fill", '#939191');
                        });
                    }
                    $("#map__india-beyond #LK").hover(function(){
                        $(".country-sri-lanka").css("color", '#dcb070');
                    }, function() {
                        $(".country-sri-lanka").css("color", '#ebebeb');
                    });

                    if($('.country-nepal.active').length) {
                        $("#map__india-beyond #NP").css("fill", '#dcb070');
                    } else {
                        $(".country-nepal").hover(function(){
                            $("#map__india-beyond #NP").css("fill", '#dcb070');
                        }, function() {
                            $("#map__india-beyond #NP").css("fill", '#939191');
                        });
                    }
                    $("#map__india-beyond #NP").hover(function(){
                        $(".country-nepal").css("color", '#dcb070');
                    }, function() {
                        $(".country-nepal").css("color", '#ebebeb');
                    });

                    if($('.country-tibet.active').length) {
                        $("#map__india-beyond #TIB").css("fill", '#dcb070');
                    } else {
                        $(".country-tibet").hover(function(){
                            $("#map__india-beyond #TIB").css("fill", '#dcb070');
                        }, function() {
                            $("#map__india-beyond #TIB").css("fill", '#939191');
                        });
                    }
                    $("#map__india-beyond #TIB").hover(function(){
                        $(".country-tibet").css("color", '#dcb070');
                    }, function() {
                        $(".country-tibet").css("color", '#ebebeb');
                    });
                }

                if($('.taxonomy-destinations-page #map__south-east-asia').length) {

                    if($('.country-indonesia.active').length) {
                        $("#map__south-east-asia #ID").css("fill", '#dcb070');
                    } else {
                        $(".country-indonesia").hover(function(){
                            $("#map__south-east-asia #ID").css("fill", '#dcb070');
                        }, function() {
                            $("#map__south-east-asia #ID").css("fill", '#939191');
                        });
                    }
                    $("#map__south-east-asia #ID").hover(function(){
                        $(".country-indonesia").css("color", '#dcb070');
                    }, function() {
                        $(".country-indonesia").css("color", '#ebebeb');
                    });

                    if($('.country-malaysia.active').length) {
                        $("#map__south-east-asia #MY").css("fill", '#dcb070');
                    } else {
                        $(".country-malaysia").hover(function(){
                            $("#map__south-east-asia #MY").css("fill", '#dcb070');
                        }, function() {
                            $("#map__south-east-asia #MY").css("fill", '#939191');
                        });
                    }
                    $("#map__south-east-asia #MY").hover(function(){
                        $(".country-malaysia").css("color", '#dcb070');
                    }, function() {
                        $(".country-malaysia").css("color", '#ebebeb');
                    });

                    if($('.country-cambodia.active').length) {
                        $("#map__south-east-asia #KH").css("fill", '#dcb070');
                    } else {
                        $(".country-cambodia").hover(function(){
                            $("#map__south-east-asia #KH").css("fill", '#dcb070');
                        }, function() {
                            $("#map__south-east-asia #KH").css("fill", '#939191');
                        });
                    }
                    $("#map__south-east-asia #LA").hover(function(){
                        $(".country-laos").css("color", '#dcb070');
                    }, function() {
                        $(".country-laos").css("color", '#ebebeb');
                    });

                    if($('.country-laos.active').length) {
                        $("#map__south-east-asia #LA").css("fill", '#dcb070');
                    } else {
                        $(".country-laos").hover(function(){
                            $("#map__south-east-asia #LA").css("fill", '#dcb070');
                        }, function() {
                            $("#map__south-east-asia #LA").css("fill", '#939191');
                        });
                    }
                    $("#map__south-east-asia #KH").hover(function(){
                        $(".country-cambodia").css("color", '#dcb070');
                    }, function() {
                        $(".country-cambodia").css("color", '#ebebeb');
                    });
                }

                if($('.taxonomy-destinations-page #map__africa').length) {

                    if($('.country-kenya.active').length) {
                        $("#map__africa #KE").css("fill", '#dcb070');
                    } else {
                        $(".country-kenya").hover(function(){
                            $("#map__africa #KE").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #KE").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #KE").hover(function(){
                        $(".country-kenya").css("color", '#dcb070');
                    }, function() {
                        $(".country-kenya").css("color", '#ebebeb');
                    });


                    if($('.country-botswana.active').length) {
                        $("#map__africa #BW").css("fill", '#dcb070');
                    } else {
                        $(".country-botswana").hover(function(){
                            $("#map__africa #BW").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #BW").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #BW").hover(function(){
                        $(".country-botswana").css("color", '#dcb070');
                    }, function() {
                        $(".country-botswana").css("color", '#ebebeb');
                    });

                    if($('.country-republic-of-congo.active').length) {
                        $("#map__africa #CG").css("fill", '#dcb070');
                    } else {
                        $(".country-republic-of-congo").hover(function(){
                            $("#map__africa #CG").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #CG").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #CG").hover(function(){
                        $(".country-republic-of-congo").css("color", '#dcb070');
                    }, function() {
                        $(".country-republic-of-congo").css("color", '#ebebeb');
                    });


                    if($('.country-algeria.active').length) {
                        $("#map__africa #DZ").css("fill", '#dcb070');
                    } else {
                        $(".country-algeria").hover(function(){
                            $("#map__africa #DZ").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #DZ").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #DZ").hover(function(){
                        $(".country-algeria").css("color", '#dcb070');
                    }, function() {
                        $(".country-algeria").css("color", '#ebebeb');
                    });


                    if($('.country-ethiopia.active').length) {
                        $("#map__africa #ET").css("fill", '#dcb070');
                    } else {
                        $(".country-ethiopia").hover(function(){
                            $("#map__africa #ET").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #ET").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #ET").hover(function(){
                        $(".country-ethiopia").css("color", '#dcb070');
                    }, function() {
                        $(".country-ethiopia").css("color", '#ebebeb');
                    });


                    if($('.country-madagascar.active').length) {
                        $("#map__africa #MG").css("fill", '#dcb070');
                    } else {
                        $(".country-madagascar").hover(function(){
                            $("#map__africa #MG").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #MG").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #MG").hover(function(){
                        $(".country-madagascar").css("color", '#dcb070');
                    }, function() {
                        $(".country-madagascar").css("color", '#ebebeb');
                    });

                    if($('.country-malawi.active').length) {
                        $("#map__africa #MW").css("fill", '#dcb070');
                    } else {
                        $(".country-malawi").hover(function(){
                            $("#map__africa #MW").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #MW").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #MW").hover(function(){
                        $(".country-malawi").css("color", '#dcb070');
                    }, function() {
                        $(".country-malawi").css("color", '#ebebeb');
                    });

                    if($('.country-mozambique.active').length) {
                        $("#map__africa #MZ").css("fill", '#dcb070');
                    } else {
                        $(".country-mozambique").hover(function(){
                            $("#map__africa #MZ").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #MZ").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #MZ").hover(function(){
                        $(".country-mozambique").css("color", '#dcb070');
                    }, function() {
                        $(".country-mozambique").css("color", '#ebebeb');
                    });

                    if($('.country-morocco.active').length) {
                        $("#map__africa #MA").css("fill", '#dcb070');
                    } else {
                        $(".country-morocco").hover(function(){
                            $("#map__africa #MA").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #MA").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #MA").hover(function(){
                        $(".country-morocco").css("color", '#dcb070');
                    }, function() {
                        $(".country-morocco").css("color", '#ebebeb');
                    });

                    if($('.country-namibia.active').length) {
                        $("#map__africa #NA").css("fill", '#dcb070');
                    } else {
                        $(".country-namibia").hover(function(){
                            $("#map__africa #NA").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #NA").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #NA").hover(function(){
                        $(".country-namibia").css("color", '#dcb070');
                    }, function() {
                        $(".country-namibia").css("color", '#ebebeb');
                    });

                    if($('.country-rwanda.active').length) {
                        $("#map__africa #RW").css("fill", '#dcb070');
                    } else {
                        $(".country-rwanda").hover(function(){
                            $("#map__africa #RW").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #RW").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #RW").hover(function(){
                        $(".country-rwanda").css("color", '#dcb070');
                    }, function() {
                        $(".country-rwanda").css("color", '#ebebeb');
                    });

                    if($('.country-tanzania.active').length) {
                        $("#map__africa #TZ").css("fill", '#dcb070');
                    } else {
                        $(".country-tanzania").hover(function(){
                            $("#map__africa #TZ").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #TZ").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #TZ").hover(function(){
                        $(".country-tanzania").css("color", '#dcb070');
                    }, function() {
                        $(".country-tanzania").css("color", '#ebebeb');
                    });

                    if($('.country-uganda.active').length) {
                        $("#map__africa #UG").css("fill", '#dcb070');
                    } else {
                        $(".country-uganda").hover(function(){
                            $("#map__africa #UG").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #UG").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #UG").hover(function(){
                        $(".country-uganda").css("color", '#dcb070');
                    }, function() {
                        $(".country-uganda").css("color", '#ebebeb');
                    });

                    if($('.country-south-africa.active').length) {
                        $("#map__africa #ZA").css("fill", '#dcb070');
                    } else {
                        $(".country-south-africa").hover(function(){
                            $("#map__africa #ZA").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #ZA").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #ZA").hover(function(){
                        $(".country-south-africa").css("color", '#dcb070');
                    }, function() {
                        $(".country-south-africa").css("color", '#ebebeb');
                    });

                    if($('.country-zambia.active').length) {
                        $("#map__africa #ZM").css("fill", '#dcb070');
                    } else {
                        $(".country-zambia").hover(function(){
                            $("#map__africa #ZM").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #ZM").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #ZM").hover(function(){
                        $(".country-zambia").css("color", '#dcb070');
                    }, function() {
                        $(".country-zambia").css("color", '#ebebeb');
                    });

                    if($('.country-zimbabwe.active').length) {
                        $("#map__africa #ZW").css("fill", '#dcb070');
                    } else {
                        $(".country-zimbabwe").hover(function(){
                            $("#map__africa #ZW").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #ZW").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #ZW").hover(function(){
                        $(".country-zimbabwe").css("color", '#dcb070');
                    }, function() {
                        $(".country-zimbabwe").css("color", '#ebebeb');
                    });

                    if($('.country-sao-tome-principe.active').length) {
                        $("#map__africa #ST").css("fill", '#dcb070');
                    } else {
                        $(".country-sao-tome-principe").hover(function(){
                            $("#map__africa #ST").css("fill", '#dcb070');
                        }, function() {
                            $("#map__africa #ST").css("fill", '#939191');
                        });
                    }
                    $("#map__africa #ST").hover(function(){
                        $(".country-sao-tome-principe").css("color", '#dcb070');
                    }, function() {
                        $(".country-sao-tome-principe").css("color", '#ebebeb');
                    });
                }

            }, 1000);
    });


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    /* ~~~~~~~~~~ Resuable functions ~~~~~~~~~~ */
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

        /* ~~~~~~~~~~ Check if current devices is mobile ~~~~~~~~~~ */

        function isMobile() {
            try{ document.createEvent("TouchEvent"); return true; }
            catch(e){ return false; }
        }

})(jQuery);