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
                
                if ( 'banner' === value ) {
                    
                    // Banner Style
                    
                    // Show
                    $('li#customize-control-navbar_banner_logo_alignment').removeClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_menu_alignment').removeClass('buildr-hidden');
                    $('li#customize-control-style_a_boxed_navbar').removeClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_transparent_menu_toggle').removeClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_height').removeClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing').removeClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing').removeClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing_mbl').removeClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing_mbl').removeClass('buildr-hidden');
                    
                    // Hide
                    $('li#customize-control-style_a_right_align_menu').addClass('buildr-hidden');
                    $('li#customize-control-style_a_always_show_logo').addClass('buildr-hidden');
                    $('li#customize-control-style_a_logo_space').addClass('buildr-hidden');
                    $('li#customize-control-style_a_collapse_height').addClass('buildr-hidden');
                    $('li#customize-control-style_a_expand_height').addClass('buildr-hidden');
                    
                } else if ( 'slim_left' === value ) {
                    
                    // Slim Left Style
                    
                    // Show
                    $('li#customize-control-style_a_always_show_logo').removeClass('buildr-hidden');
                    $('li#customize-control-style_a_logo_space').removeClass('buildr-hidden');
                    $('li#customize-control-style_a_collapse_height').removeClass('buildr-hidden');
                    $('li#customize-control-style_a_expand_height').removeClass('buildr-hidden');
                    $('li#customize-control-style_a_right_align_menu').removeClass('buildr-hidden');
                    $('li#customize-control-style_a_boxed_navbar').removeClass('buildr-hidden');
                    
                    // Hide
                    $('li#customize-control-navbar_banner_logo_alignment').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_menu_alignment').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_transparent_menu_toggle').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_height').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing_mbl').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing_mbl').addClass('buildr-hidden');
                    
                } else {
                    
                    // Slim Split Style
                    
                    // Show
                    $('li#customize-control-style_a_always_show_logo').removeClass('buildr-hidden');
                    $('li#customize-control-style_a_logo_space').removeClass('buildr-hidden');
                    $('li#customize-control-style_a_collapse_height').removeClass('buildr-hidden');
                    $('li#customize-control-style_a_expand_height').removeClass('buildr-hidden');
                    
                    // Hide
                    $('li#customize-control-navbar_banner_logo_alignment').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_menu_alignment').addClass('buildr-hidden');
                    $('li#customize-control-style_a_right_align_menu').addClass('buildr-hidden');
                    $('li#customize-control-style_a_boxed_navbar').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_transparent_menu_toggle').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_height').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing_mbl').addClass('buildr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing_mbl').addClass('buildr-hidden');
                    
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
                
//                if ( value || $('#custom-logo-wrap').hasClass('has-logo') ) {
//                    $('li#customize-control-style_a_always_show_logo').removeClass('buildr-hidden');
//                    $('li#customize-control-style_a_logo_space').removeClass('buildr-hidden');
//                    $('li#customize-control-style_a_mobile_logo_height').removeClass('buildr-hidden');
//                    $('li#customize-control-navbar_banner_logo_height').removeClass('buildr-hidden');
//                } else {
//                    $('li#customize-control-style_a_always_show_logo').addClass('buildr-hidden');
//                    $('li#customize-control-style_a_logo_space').addClass('buildr-hidden');
//                    $('li#customize-control-style_a_mobile_logo_height').addClass('buildr-hidden');                    
//                    $('li#customize-control-navbar_banner_logo_height').addClass('buildr-hidden');
//                }
                
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
                
                if ( value ) {
                    $('li#customize-control-navbar_social_drawer_background').removeClass('buildr-hidden');
                    $('li#customize-control-navbar_social_link_foreground').removeClass('buildr-hidden');
                    $('li#customize-control-navbar_social_link_foreground_hover').removeClass('buildr-hidden');
                } else {
                    $('li#customize-control-navbar_social_drawer_background').addClass('buildr-hidden');
                    $('li#customize-control-navbar_social_link_foreground').addClass('buildr-hidden');
                    $('li#customize-control-navbar_social_link_foreground_hover').addClass('buildr-hidden');
                }
                
            }
            
        });

        // Custom Header - Main Heading Toggle
        customize( 'custom_header_show_logo', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( value ) {
                    $('li#customize-control-buildr_custom_header_logo_height').removeClass('buildr-hidden');
                    $('li#customize-control-buildr_custom_header_logo_height_mbl').removeClass('buildr-hidden');
                } else {
                    $('li#customize-control-buildr_custom_header_logo_height').addClass('buildr-hidden');
                    $('li#customize-control-buildr_custom_header_logo_height_mbl').addClass('buildr-hidden');
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
                
                if ( value ) {
                    $('li#customize-control-custom_header_title_content').removeClass('buildr-hidden');
                    $('li#customize-control-custom_header_title_font_family').removeClass('buildr-hidden');
                    $('li#customize-control-custom_header_title_font_size').removeClass('buildr-hidden');
                    $('li#customize-control-custom_header_title_letter_spacing').removeClass('buildr-hidden');
                    $('li#customize-control-custom_header_title_color').removeClass('buildr-hidden');
                    $('li#customize-control-custom_header_title_uppercase').removeClass('buildr-hidden');
                } else {
                    $('li#customize-control-custom_header_title_content').addClass('buildr-hidden');
                    $('li#customize-control-custom_header_title_font_family').addClass('buildr-hidden');
                    $('li#customize-control-custom_header_title_font_size').addClass('buildr-hidden');
                    $('li#customize-control-custom_header_title_letter_spacing').addClass('buildr-hidden');
                    $('li#customize-control-custom_header_title_color').addClass('buildr-hidden');
                    $('li#customize-control-custom_header_title_uppercase').addClass('buildr-hidden');
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
                
                if ( value ) {
                    $('li#customize-control-custom_header_menu_font_family').removeClass('buildr-hidden');
                    $('li#customize-control-custom_header_menu_font_size').removeClass('buildr-hidden');
                    $('li#customize-control-custom_header_menu_letter_spacing').removeClass('buildr-hidden');
                    $('li#customize-control-custom_header_menu_color').removeClass('buildr-hidden');
                    $('li#customize-control-custom_header_menu_link_spacing').removeClass('buildr-hidden');
                } else {
                    $('li#customize-control-custom_header_menu_font_family').addClass('buildr-hidden');
                    $('li#customize-control-custom_header_menu_font_size').addClass('buildr-hidden');
                    $('li#customize-control-custom_header_menu_letter_spacing').addClass('buildr-hidden');
                    $('li#customize-control-custom_header_menu_color').addClass('buildr-hidden');
                    $('li#customize-control-custom_header_menu_link_spacing').addClass('buildr-hidden');
                }
                
            }
            
        });
        
        // Custom Header - Gradient Overlay
        customize( 'parallax_layers_include_color_layer', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'no' === value ) {
                    $('li#customize-control-parallax_layers_single_color').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_single_color_opacity').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_style').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_overall_opacity').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_linear_direction').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color_opacity').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color_opacity').addClass('buildr-hidden');
                } else if ( 'single' === value ) {
                    $('li#customize-control-parallax_layers_single_color').removeClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_single_color_opacity').removeClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_style').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_overall_opacity').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_linear_direction').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color_opacity').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color_opacity').addClass('buildr-hidden');
                } else {
                    $('li#customize-control-parallax_layers_single_color').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_single_color_opacity').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_style').removeClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_overall_opacity').removeClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_linear_direction').removeClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color').removeClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color_opacity').removeClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color').removeClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color_opacity').removeClass('buildr-hidden');
                }
                
            }
            
        });
        
        // Custom Header - Height Units Toggle
        customize( 'buildr_custom_header_height_unit', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'percent' === value ) {
                    $('li#customize-control-buildr_custom_header_height_pixels').addClass('buildr-hidden');
                    $('li#customize-control-buildr_custom_header_height_pixels_mbl').addClass('buildr-hidden');
                    $('li#customize-control-buildr_custom_header_height_percent').removeClass('buildr-hidden');
                    $('li#customize-control-buildr_custom_header_height_percent_mbl').removeClass('buildr-hidden');
                } else {
                    $('li#customize-control-buildr_custom_header_height_percent').addClass('buildr-hidden');
                    $('li#customize-control-buildr_custom_header_height_percent_mbl').addClass('buildr-hidden');
                    $('li#customize-control-buildr_custom_header_height_pixels').removeClass('buildr-hidden');
                    $('li#customize-control-buildr_custom_header_height_pixels_mbl').removeClass('buildr-hidden');
                }
                
            }
            
        });
        
        // Custom Header - Height Units Toggle
        customize( 'custom_header_style_toggle', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'parallax_vertical' === value ) {
                    $('li#customize-control-parallax_layers_texture_pattern').addClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_texture_layer_opacity').addClass('buildr-hidden');
                } else {
                    $('li#customize-control-parallax_layers_texture_pattern').removeClass('buildr-hidden');
                    $('li#customize-control-parallax_layers_texture_layer_opacity').removeClass('buildr-hidden');
                }
                
            }
            
        });
        
    });
    
})(jQuery);