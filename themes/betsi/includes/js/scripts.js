jQuery( document ).ready( function( $ ) {
    $( '.side-title-form' ).on('click', function() {
        $(".textwidget.custom-html-widget").show();
        $(".close-x").show();
        $( '.side-title-form' ).hide();
    });

    $( '.close-x' ).on('click', function() {
        $(".textwidget.custom-html-widget").hide();
        $(".widget_text.close-x").hide();
        $('.side-title-form' ).show();
    });

    $('.stellarnav').stellarNav({
        theme     : 'dark',
        breakpoint: 898,
        locationBtn: false,
        sticky     : false,
        position: 'static',
        showArrows: true,
        closeBtn     : true,
        scrollbarFix: false
    });
} );
