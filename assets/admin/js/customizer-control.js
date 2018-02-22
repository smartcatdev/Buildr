(function ($) {

    wp.customize.bind('ready', function () {

        var customize = this
        

        // This is an option thats being loaded or customized
        customize( 'navbar_style', function ( value ) {
            
            // Runs on initial load
            toggle( value.get() ) 
            
            // Runs on value change

            value.bind( function ( to ) {    
                toggle( to )
            })
            
            function toggle( value ) {
                
                if( 'custom_a' === value ) {
                    $('#accordion-section-section_nav_style_a').removeClass('designr-hidden')   
                }else{
                    $('#accordion-section-section_nav_style_a').addClass('designr-hidden')
                }
                
            }
            
        })
        
        
    })
    
})(jQuery)