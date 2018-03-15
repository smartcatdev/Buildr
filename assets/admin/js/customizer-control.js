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
                    $('li#customize-control-navbar_banner_logo_alignment').removeClass('designr-hidden');
                    $('li#customize-control-navbar_banner_menu_alignment').removeClass('designr-hidden');
                    $('li#customize-control-style_a_boxed_navbar').removeClass('designr-hidden');
                    $('li#customize-control-navbar_banner_transparent_menu_toggle').removeClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_height').removeClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing').removeClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing').removeClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing_mbl').removeClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing_mbl').removeClass('designr-hidden');
                    
                    // Hide
                    $('li#customize-control-style_a_right_align_menu').addClass('designr-hidden');
                    $('li#customize-control-style_a_always_show_logo').addClass('designr-hidden');
                    $('li#customize-control-style_a_logo_space').addClass('designr-hidden');
                    $('li#customize-control-style_a_collapse_height').addClass('designr-hidden');
                    $('li#customize-control-style_a_expand_height').addClass('designr-hidden');
                    
                } else if ( 'slim_left' === value ) {
                    
                    // Slim Left Style
                    
                    // Show
                    $('li#customize-control-style_a_always_show_logo').removeClass('designr-hidden');
                    $('li#customize-control-style_a_logo_space').removeClass('designr-hidden');
                    $('li#customize-control-style_a_collapse_height').removeClass('designr-hidden');
                    $('li#customize-control-style_a_expand_height').removeClass('designr-hidden');
                    $('li#customize-control-style_a_right_align_menu').removeClass('designr-hidden');
                    $('li#customize-control-style_a_boxed_navbar').removeClass('designr-hidden');
                    
                    // Hide
                    $('li#customize-control-navbar_banner_logo_alignment').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_menu_alignment').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_transparent_menu_toggle').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_height').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing_mbl').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing_mbl').addClass('designr-hidden');
                    
                } else {
                    
                    // Slim Split Style
                    
                    // Show
                    $('li#customize-control-style_a_always_show_logo').removeClass('designr-hidden');
                    $('li#customize-control-style_a_logo_space').removeClass('designr-hidden');
                    $('li#customize-control-style_a_collapse_height').removeClass('designr-hidden');
                    $('li#customize-control-style_a_expand_height').removeClass('designr-hidden');
                    
                    // Hide
                    $('li#customize-control-navbar_banner_logo_alignment').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_menu_alignment').addClass('designr-hidden');
                    $('li#customize-control-style_a_right_align_menu').addClass('designr-hidden');
                    $('li#customize-control-style_a_boxed_navbar').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_transparent_menu_toggle').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_height').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing_mbl').addClass('designr-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing_mbl').addClass('designr-hidden');
                    
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
//                    $('li#customize-control-style_a_always_show_logo').removeClass('designr-hidden');
//                    $('li#customize-control-style_a_logo_space').removeClass('designr-hidden');
//                    $('li#customize-control-style_a_mobile_logo_height').removeClass('designr-hidden');
//                    $('li#customize-control-navbar_banner_logo_height').removeClass('designr-hidden');
//                } else {
//                    $('li#customize-control-style_a_always_show_logo').addClass('designr-hidden');
//                    $('li#customize-control-style_a_logo_space').addClass('designr-hidden');
//                    $('li#customize-control-style_a_mobile_logo_height').addClass('designr-hidden');                    
//                    $('li#customize-control-navbar_banner_logo_height').addClass('designr-hidden');
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
        customize( 'custom_header_show_logo', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( value ) {
                    $('li#customize-control-designr_custom_header_logo_height').removeClass('designr-hidden');
                    $('li#customize-control-designr_custom_header_logo_height_mbl').removeClass('designr-hidden');
                } else {
                    $('li#customize-control-designr_custom_header_logo_height').addClass('designr-hidden');
                    $('li#customize-control-designr_custom_header_logo_height_mbl').addClass('designr-hidden');
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
                
                if ( value ) {
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
                    $('li#customize-control-parallax_layers_single_color').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_single_color_opacity').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_style').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_overall_opacity').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_linear_direction').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color_opacity').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color_opacity').addClass('designr-hidden');
                } else if ( 'single' === value ) {
                    $('li#customize-control-parallax_layers_single_color').removeClass('designr-hidden');
                    $('li#customize-control-parallax_layers_single_color_opacity').removeClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_style').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_overall_opacity').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_linear_direction').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color_opacity').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color_opacity').addClass('designr-hidden');
                } else {
                    $('li#customize-control-parallax_layers_single_color').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_single_color_opacity').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_style').removeClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_overall_opacity').removeClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_linear_direction').removeClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color').removeClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color_opacity').removeClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color').removeClass('designr-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color_opacity').removeClass('designr-hidden');
                }
                
            }
            
        });
        
        // Custom Header - Height Units Toggle
        customize( 'designr_custom_header_height_unit', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'percent' === value ) {
                    $('li#customize-control-designr_custom_header_height_pixels').addClass('designr-hidden');
                    $('li#customize-control-designr_custom_header_height_pixels_mbl').addClass('designr-hidden');
                    $('li#customize-control-designr_custom_header_height_percent').removeClass('designr-hidden');
                    $('li#customize-control-designr_custom_header_height_percent_mbl').removeClass('designr-hidden');
                } else {
                    $('li#customize-control-designr_custom_header_height_percent').addClass('designr-hidden');
                    $('li#customize-control-designr_custom_header_height_percent_mbl').addClass('designr-hidden');
                    $('li#customize-control-designr_custom_header_height_pixels').removeClass('designr-hidden');
                    $('li#customize-control-designr_custom_header_height_pixels_mbl').removeClass('designr-hidden');
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
                    $('li#customize-control-parallax_layers_texture_pattern').addClass('designr-hidden');
                    $('li#customize-control-parallax_layers_texture_layer_opacity').addClass('designr-hidden');
                } else {
                    $('li#customize-control-parallax_layers_texture_pattern').removeClass('designr-hidden');
                    $('li#customize-control-parallax_layers_texture_layer_opacity').removeClass('designr-hidden');
                }
                
            }
            
        });
        
    });
    
})(jQuery);