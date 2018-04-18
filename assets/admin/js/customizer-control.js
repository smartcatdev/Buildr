(function ($) {
    
    
    $(document).on( 'click', '.buildr-dismiss-companion', function(e) {
       
        e.preventDefault();
        
        $.ajax({
            url         : buildr_customize.ajax_url,
            type        : 'post',
            dataType    : 'json',
            data        : {
                'action'                : 'buildr_dismiss_companion',
                'buildr_dismiss_nonce'  : buildr_customize.buildr_dismiss_nonce
            }
        })
        
        .done( function( data) {
            wp.customize.section('companion-plugin').deactivate();
        })
       
    })
    

    
})(jQuery);