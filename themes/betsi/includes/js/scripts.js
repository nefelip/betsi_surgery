jQuery(document).ready(function ($) {

    var animationEnd = (function (el) {
        var animations = {
            animation: 'animationend',
            OAnimation: 'oAnimationEnd',
            MozAnimation: 'mozAnimationEnd',
            WebkitAnimation: 'webkitAnimationEnd',
        };

        for (var t in animations) {
            if (el.style[t] !== undefined) {
                return animations[t];
            }
        }
    })(document.createElement('div'));

    $('.side-title-form').on('click', function () {
        $(this).fadeOut('fast', function () {
            if ($("#patient-form-wrapper").hasClass('slideOutLeft')) {
                $("#patient-form-wrapper").removeClass('slideOutLeft');
            }
            $("#patient-form-wrapper").addClass('slideInLeft');
        });
    });

    $('.close-x').on('click', function () {
        $("#patient-form-wrapper").addClass('slideOutLeft');
        $('#patient-form-wrapper').one(animationEnd, function() {
            $('.side-title-form').fadeIn();
            if ( $("#patient-form-wrapper").hasClass('slideInLeft')) {
                $("#patient-form-wrapper").removeClass('slideInLeft');
            }
        });
    });

    $('.stellarnav').stellarNav({
        theme: 'dark',
        breakpoint: 898,
        locationBtn: false,
        sticky: false,
        position: 'static',
        showArrows: true,
        closeBtn: true,
        scrollbarFix: false
    });

     $('.btnNext').click(function(){
      $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });

      $('.btnPrevious').click(function(){
      $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });
});
