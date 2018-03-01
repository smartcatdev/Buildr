(function ($) {

    wp.customize.bind('ready', function () {

        var customize = this

        // Navbar Style ( Split || Left Align )
        customize( 'navbar_style', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'slim_split' === value || 'slim_left' === value ) {
                    $('#accordion-section-section_nav_style_a').removeClass('designr-hidden');
                } else {
                    $('#accordion-section-section_nav_style_a').addClass('designr-hidden');
                }
                
            }
            
        });
        
        // Navbar Style ( Left Align )
        customize( 'navbar_style', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'slim_left' === value ) {
                    $('li#customize-control-style_a_right_align_menu').removeClass('designr-hidden');
                    $('li#customize-control-style_a_boxed_navbar').removeClass('designr-hidden');
                } else {
                    $('li#customize-control-style_a_right_align_menu').addClass('designr-hidden');
                    $('li#customize-control-style_a_boxed_navbar').addClass('designr-hidden');
                }
                
            }
            
        });

        // Navbar Style ( Split )
        customize( 'navbar_style', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'slim_split' === value ) {
                    $('li#customize-control-navbar_social_drawer_background').removeClass('designr-hidden');
                } else {
                    $('li#customize-control-navbar_social_drawer_background').addClass('designr-hidden');
                }
                
            }
            
        });

        // Custom Logo
        customize( 'custom_logo', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( value || $('#custom-logo-wrap').hasClass('has-logo') ) {
                    $('li#customize-control-style_a_always_show_logo').removeClass('designr-hidden');
                    $('li#customize-control-style_a_logo_space').removeClass('designr-hidden');
                    $('li#customize-control-style_a_mobile_logo_height').removeClass('designr-hidden');
                } else {
                    $('li#customize-control-style_a_always_show_logo').addClass('designr-hidden');
                    $('li#customize-control-style_a_logo_space').addClass('designr-hidden');
                    $('li#customize-control-style_a_mobile_logo_height').addClass('designr-hidden');                    
                }
                
            }
            
        });

        // Navbar - Social Icon Toggle
        customize( 'navbar_show_social', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'yes' === value ) {
                    $('li#customize-control-navbar_social_drawer_background').removeClass('designr-hidden');
                    $('li#customize-control-navbar_social_link_foreground').removeClass('designr-hidden');
                    $('li#customize-control-navbar_social_link_foreground_hover').removeClass('designr-hidden');
                } else {
                    $('li#customize-control-navbar_social_drawer_background').addClass('designr-hidden');
                    $('li#customize-control-navbar_social_link_foreground').addClass('designr-hidden');
                    $('li#customize-control-navbar_social_link_foreground_hover').addClass('designr-hidden');
                }
                
            }
            
        });

        // Custom Header - Main Heading Toggle
        customize( 'custom_header_show_heading', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'yes' === value ) {
                    $('li#customize-control-custom_header_title_content').removeClass('designr-hidden');
                    $('li#customize-control-custom_header_title_font_family').removeClass('designr-hidden');
                    $('li#customize-control-custom_header_title_font_size').removeClass('designr-hidden');
                    $('li#customize-control-custom_header_title_letter_spacing').removeClass('designr-hidden');
                    $('li#customize-control-custom_header_title_color').removeClass('designr-hidden');
                } else {
                    $('li#customize-control-custom_header_title_content').addClass('designr-hidden');
                    $('li#customize-control-custom_header_title_font_family').addClass('designr-hidden');
                    $('li#customize-control-custom_header_title_font_size').addClass('designr-hidden');
                    $('li#customize-control-custom_header_title_letter_spacing').addClass('designr-hidden');
                    $('li#customize-control-custom_header_title_color').addClass('designr-hidden');
                }
                
            }
            
        });
        
        // Custom Header - Menu Toggle
        customize( 'custom_header_show_menu', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'yes' === value ) {
                    $('li#customize-control-custom_header_menu_font_family').removeClass('designr-hidden');
                    $('li#customize-control-custom_header_menu_font_size').removeClass('designr-hidden');
                    $('li#customize-control-custom_header_menu_letter_spacing').removeClass('designr-hidden');
                    $('li#customize-control-custom_header_menu_color').removeClass('designr-hidden');
                    $('li#customize-control-custom_header_menu_link_spacing').removeClass('designr-hidden');
                } else {
                    $('li#customize-control-custom_header_menu_font_family').addClass('designr-hidden');
                    $('li#customize-control-custom_header_menu_font_size').addClass('designr-hidden');
                    $('li#customize-control-custom_header_menu_letter_spacing').addClass('designr-hidden');
                    $('li#customize-control-custom_header_menu_color').addClass('designr-hidden');
                    $('li#customize-control-custom_header_menu_link_spacing').addClass('designr-hidden');
                }
                
            }
            
        });
        
    });
    
})(jQuery);