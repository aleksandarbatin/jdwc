$(document).ready(function(){


    //change content on language select
    $('#language li').click(function(event) {

            var country = $(this).attr('data-country');
            var url = ROOT_URL + country

            if (country != LANG) {
               if (url) {
                   window.location = url;
               }
           }
    });
    //add active class od language drop down
    $('#language li').each(function() {

        var countries = $(this).attr('data-country');

        if (countries == LANG) {
            $(this).addClass('active');
            $(this).prependTo(".langSwitcher__current");
        }

    });

    $('.language__trigger').click(function() {
      $('.langSwitcher').toggleClass('active');
      $('.langSwitcher__links').toggleClass('active');
      $('.arrowDown').toggleClass('active');
    });

    //change social links based on language
    $('.socials').children().each(function () {
        var link = $(this).data(LANG);

        $(this).find('a').attr('href', link);

    });

    //add active class on country on ambasadors page
    $('.ambassadors__lang').each(function () {

        var countries = $(this).attr('data-country');

        if (countries == LANG) {
            $(this).addClass('active');
        }
    });

    //Ambasadors how/hide
    $('.ambassadors__lang').click(function(){
        $('.ambassador').hide("slow");
        $('#div'+$(this).attr('data-target')).show("slow");
        $('.ambassadors__lang').removeClass('active');
        $(this).addClass('active');
    });

    //trigger logo animation
    if($(window).width() > 767){
        $(window).on('load', function() {
            setTimeout(function(){
                $('.logoHolder').addClass('go');
                $('.curtain').addClass('open');
            }, 1500);
            setTimeout(function(){$('.logo').css('backface-visibility', 'visible'); }, 2600);

            function goLogo() {

            }
        });
    }

    // #####################################
    // Mobile menu toggle
    // #####################################

    $('.header__mobMenu').click(function(){
        $('.header__items').toggle("slow");
        $(this).toggleClass('rotate', 1000);
    });

    // #####################################
    // Responsive video-iframe
    // #####################################

    $(window).on('load', function() {
        var $allVideos = $("iframe"),
            $fluidEl = $(".videoWrapper");

            $allVideos.each(function() {

            $(this)
            // jQuery .data does not work on object/embed elements
            .attr('data-aspectRatio', this.height / this.width)
            .removeAttr('height')
            .removeAttr('width');

        });

        $(window).resize(function() {
            var newWidth = $fluidEl.width();
                $allVideos.each(function() {

                var $el = $(this);
                $el
                .width(newWidth)
                .height(newWidth * $el.attr('data-aspectRatio'));

            });

        }).resize();
    });


    // #####################################
    // PAGE PILING
    // #####################################
    if($(window).width() > 767){
        $('#pagepiling').pagepiling();
    }

})
