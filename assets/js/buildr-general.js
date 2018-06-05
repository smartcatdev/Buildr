jQuery(document).ready(function ($) {

    new WOW({
        callback: function ( box ) {
            if ( !$(box).hasClass('textillate') ) { return; }
            $(box).text( 
                $.trim( $(box).text() )
            ).textillate({
                in: {
                    // set the effect name
                    effect: 'flipInY',

                    // set the delay factor applied to each consecutive character
                    delayScale: 1.75,

                    // set the delay between each character
                    delay: 30,

                    // randomize the character sequence
                    shuffle: false,

                }
            });
        }
    }).init();
    
    if ( buildr_local_general.ease_scroll_toggle == 'yes' ) {
        
        $("html").easeScroll({

    //        frameRate: 60,
            animationTime: 1750,
            stepSize: 120,
    //        pulseAlgorithm: 1,
    //        pulseScale: 8,
    //        pulseNormalize: 1,
    //        accelerationDelta: 20,
    //        accelerationMax: 1,
    //        keyboardSupport: true,
            arrowScroll: 100,
    //        touchpadSupport: true,
    //        fixedBackground: true

        });
        
    }
    
    $( '#edd-gallery-wrap' ).slick({
        dots: false,
        arrows: true,
        pauseOnHover: true,
        pauseOnFocus: false,
        infinite: true,
        speed: 600,
        fade: false,
        autoplay: false,
        autoplaySpeed: 5000,
        cssEase: 'ease',
        prevArrow: '<span class="slick-prev slick-arrow"><svg version="1.1" id="prevArrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 407.437 407.437" style="enable-background:new 0 0 407.437 407.437;" xml:space="preserve"><g><polygon points="203.718,84.507 386.258,266.453 407.437,245.205 203.718,42.15 0,245.205 21.179,266.453 	"/><polygon points="0,344.039 21.179,365.287 203.718,183.341 386.258,365.287 407.437,344.039 203.718,140.984 "/></g></svg></span>',
        nextArrow: '<span class="slick-next slick-arrow"><svg version="1.1" id="nextArrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 407.437 407.437" style="enable-background:new 0 0 407.437 407.437;" xml:space="preserve"><g><polygon points="203.718,84.507 386.258,266.453 407.437,245.205 203.718,42.15 0,245.205 21.179,266.453 	"/><polygon points="0,344.039 21.179,365.287 203.718,183.341 386.258,365.287 407.437,344.039 203.718,140.984 "/></g></svg></span>'
    });
    
});