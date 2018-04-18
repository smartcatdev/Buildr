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
    
});