(function ($) {

    wp.customize.bind('ready', function () {

        var customize = this
        
        customize( 'navbar_style', function ( value ) {
            
            
            toggle( value.get() )
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