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
  
    $('img.custom-logo').addClass('animated');
  
    $("header#masthead #slim-header-wrap").sticky({
        topSpacing: $('#wpadminbar').length > 0 ? 32 : 0,
        zIndex:9999,
    }).on('sticky-start', function() { 
        
        // Expand Nav Line Height
        $(this).find('#slim-header ul.slim-header-menu > li').stop().animate({
            lineHeight: designrLocalized.style_a_expand_height,
        }, 200 );
        
        $('#custom-logo-wrap.sometimes-hidden img.custom-logo').removeClass('fadeOut').addClass('bounceIn');
        
        // Expand Padding Top on #content
        $('div#content').addClass('sticky-header');
        
    }).on('sticky-end', function() { 
        
        $('#custom-logo-wrap.sometimes-hidden img.custom-logo').removeClass('bounceIn').addClass('fadeOut');
        
        // Contract Padding Top on #content
        $('div#content').removeClass('sticky-header');
        
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
   
    /* -------------------------------------------------------------------------
     * Header: Slim Split Social Drawer
     * ---------------------------------------------------------------------- */
    $('#split-social-trigger').on( 'click', function() {
        
        $(this).stop().toggleClass('expanded').parent().parent().find('.navbar-social').stop().toggleClass('expanded');
        
    });
    
});