jQuery(document).ready(function ($) {

    /* -------------------------------------------------------------------------
     * Header: Custom A - Split Primary Menu (sticky.js)
     * ---------------------------------------------------------------------- */
    
    // Iterate through all <li> with submenus and match center the <ul> child
    $('#slim-header ul.slim-header-menu > li.menu-item-has-children').each( function( index ) {
        if ( ( ( 200 - $(this).outerWidth() ) / 2 ) > 0 ) {
            $(this).find('ul.sub-menu').css('transform','translate(-' + ( ( 200 - $(this).outerWidth() ) / 2 ) + 'px,0)');    
        } else {
            $(this).find('ul.sub-menu').css('width', $(this).outerWidth() + 'px');    
        }
    });
    
    $("header#masthead #slim-header-wrap").sticky({
        topSpacing: $('#wpadminbar').length > 0 ? 32 : 0,
        zIndex:9999,
    }).on('sticky-start', function() { 
        
        // Expand Nav Line Height
        $(this).find('#slim-header ul.slim-header-menu > li').stop().animate({
            lineHeight: designrLocalized.style_a_expand_height,
        }, 400 );
        
    }).on('sticky-end', function() { 
        
        // Contract Nav Line Height
        $(this).find('#slim-header ul.slim-header-menu > li').stop().animate({
            lineHeight: designrLocalized.style_a_collapse_height,
        }, 200 );
        
    });
   
    
    /* -------------------------------------------------------------------------
     * Header: Mobile Menu - Expand / Contract
     * ---------------------------------------------------------------------- */

    var mobile_nav_open = false;
    $( "#mobile-menu-trigger" ).on( 'click', function() {
        
        if ( mobile_nav_open ) {
            
            $('ul#mobile-menu').stop().slideUp().find('li').stop().each( function( index ) {
                $(this).animate({
                    opacity: 0,
                });
            });
            
            $('ul#mobile-menu').removeClass('expanded');
            $('#mobile-menu-trigger .bar').toggleClass('animate');
            mobile_nav_open = false;
            
        } else {
            
            $('ul#mobile-menu').stop().slideDown().find('li').stop().each( function( index ) {
                $(this).stop().delay( index * 75 ).animate({
                    opacity: 1,
                });
            });

            $('ul#mobile-menu').addClass('expanded');
            $('#mobile-menu-trigger .bar').toggleClass('animate');
            mobile_nav_open = true;
            
        }
        
    });
    
});