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
        
        $('#custom-logo-wrap.sometimes-hidden img.custom-logo').removeClass('fadeOut').addClass('bounceIn');
        
        // Expand Padding Top on #content
        $('div#content').addClass('sticky-header');
        
    }).on('sticky-end', function() { 
        
        $('#custom-logo-wrap.sometimes-hidden img.custom-logo').removeClass('bounceIn').addClass('fadeOut');
        
        // Contract Padding Top on #content
        $('div#content').removeClass('sticky-header');
        
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
     * Header: Mobile Menu - Submenu Expansion / Contraction
     * ---------------------------------------------------------------------- */

    $( '#mobile-menu-wrap ul#mobile-menu > li.menu-item-has-children').prepend('<span style="font-family: Helvetica;">+</span>');
    $( "#mobile-menu-wrap ul#mobile-menu > li.menu-item-has-children > span" ).on( 'click', function() {
        
        $(this).stop().toggleClass('expanded').parent().find('ul.sub-menu').stop().slideToggle();
        
    });
   
    /* -------------------------------------------------------------------------
     * Header: Slim Split Social Drawer
     * ---------------------------------------------------------------------- */
    $('#split-social-trigger').on( 'click', function() {
        
        $(this).stop().toggleClass('expanded').parent().parent().find('.navbar-social').stop().toggleClass('expanded');
        
    });
    
    /* -------------------------------------------------------------------------
     * Custom Header: Layered Parallax Section
     * ---------------------------------------------------------------------- */
    
    if ( $('div#designr-custom-header.parallax_layers').length ) {
        
        $(window).resize( function(){
            $( '.jparallax-layer' ).parallax({
                // Global Options
                mouseport: $('body')
            },{
                // Image Layer
                xparallax: designr_local.parallax_image_layer,
                yparallax: designr_local.parallax_image_layer
            },
            {
                // Texture Layer Options
                xparallax: designr_local.parallax_texture_layer,
                yparallax: designr_local.parallax_texture_layer
            },{
                // Color Layer Options
                xparallax: designr_local.parallax_color_layer,
                yparallax: designr_local.parallax_color_layer,
                xorigin: 0,
                yorigin: 0,
            },{
                // Content Layer Options
                xparallax: designr_local.parallax_content_layer,
                yparallax: designr_local.parallax_content_layer
            });
        });

        $( '.jparallax-layer' ).parallax({
            // Global Options
            mouseport: $('body')
        },{
            // Image Layer
            xparallax: designr_local.parallax_image_layer,
            yparallax: designr_local.parallax_image_layer
        },
        {
            // Texture Layer Options
            xparallax: designr_local.parallax_texture_layer,
            yparallax: designr_local.parallax_texture_layer
        },{
            // Color Layer Options
            xparallax: designr_local.parallax_color_layer,
            yparallax: designr_local.parallax_color_layer,
            xorigin: 0,
            yorigin: 0,
        },{
            // Content Layer Options
            xparallax: designr_local.parallax_content_layer,
            yparallax: designr_local.parallax_content_layer
        }).parent().find('.jparallax-layer.content-layer').fadeIn();
        
    }
        
});