jQuery( document ).ready( function( $ ) {
    $( '.side-title-form' ).on('click', function() {
        $(".custom-html-widget").show();
        $(".close-x").show();
        $( '.side-title-form' ).hide();
    });

    $( '.close-x' ).on('click', function() {
        $(".custom-html-widget").hide();
        $(".widget_text.close-x").hide();
        $('.side-title-form' ).show();
    });
} );
