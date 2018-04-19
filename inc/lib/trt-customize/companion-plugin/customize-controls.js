( function( api ) {

	// Extends our custom "companion-plugin" section.
	api.sectionConstructor['companion-plugin'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

    

} )( wp.customize );

(function ($) {
    
    // Clicker so that theme editor can dismiss notice to install plugin
    $(document).on( 'click', '.buildr-dismiss-companion', function(e) {
       
        e.preventDefault()
        
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
            wp.customize.section('buildr_companion').deactivate()
        })
       
    })
    
    $(document).on( 'click', '.buildr-initiate-dismiss', function(e) {
        $(this).hide()
        $('.buildr-dismiss-confirm').slideDown(300) 
    })
    
})(jQuery);