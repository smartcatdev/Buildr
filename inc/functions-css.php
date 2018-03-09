<?php

/**
 * Enqueue scripts and styles.
 */
function designr_wp_head_styles() { ?>

    <style type="text/css">

        /* ---------------------------------------------------------------------
         * Typography
         * ------------------------------------------------------------------ */

        body,
        .site-branding .site-title,
        div#footer-branding-wrap .site-title,
        div#custom-header-content .custom-header-title,
        div#designr-custom-header.parallax_layers .custom-header-title,
        #pre-footer h2.widget-title {
            font-family: <?php esc_attr_e( get_theme_mod( 'secondary_font', 'Abel, sans-serif' ) ); ?>;
        }

        h1,h2,h3,h4,h5,h6,
        ul#mobile-menu li a,
        ul.slim-header-menu > li a,
        ul#custom-header-menu > li a,
        .masonry-card-blog .blog_item_wrap .blog_item .inner .blog-meta {
            font-family: <?php esc_attr_e( get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ); ?>;
        }

        h1,h2,h3,h4,h5,h6 {
            letter-spacing: <?php esc_attr_e( get_theme_mod( 'headings_letter_spacing', '0.0' ) ); ?>em;
            line-height: <?php esc_attr_e( get_theme_mod( 'headings_line_height', '1' ) ); ?>em;
        }

        <?php if ( get_theme_mod( 'navbar_links_font', 'primary' ) == 'secondary' ) : ?>

            ul#mobile-menu li a,
            ul.slim-header-menu > li a {
                font-family: <?php esc_attr_e( get_theme_mod( 'secondary_font', 'Abel, sans-serif' ) ); ?>;
            }

        <?php endif; ?>

        <?php if ( get_theme_mod( 'custom_header_menu_font_family', 'primary' ) == 'secondary' ) : ?>

            ul#custom-header-menu > li a {
                font-family: <?php esc_attr_e( get_theme_mod( 'secondary_font', 'Abel, sans-serif' ) ); ?>;
            }

        <?php endif; ?>

        <?php if ( get_theme_mod( 'custom_header_title_font_family', 'secondary' ) == 'primary' ) : ?>

            div#custom-header-content .custom-header-title,
            div#designr-custom-header.parallax_layers .custom-header-title {
                font-family: <?php esc_attr_e( get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ); ?>;
            }

        <?php endif; ?>
        
        <?php if ( get_theme_mod( 'prefooter_widget_title_font_family', 'secondary' ) == 'primary' ) : ?>

            #pre-footer h2.widget-title {
                font-family: <?php esc_attr_e( get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ); ?>;
            }

        <?php endif; ?>
        
        header#masthead.header-style-slim .site-title {
           text-transform: <?php echo get_theme_mod( 'navbar_site_title_uppercase', true ) ? 'uppercase' : 'none'; ?>;
        }
        div#custom-header-content .custom-header-title, 
        div#designr-custom-header.parallax_layers .custom-header-title {
           text-transform: <?php echo get_theme_mod( 'custom_header_title_uppercase', true ) ? 'uppercase' : 'none'; ?>;
        }
        footer div#footer-branding-wrap .site-title {
           text-transform: <?php echo get_theme_mod( 'footer_site_title_uppercase', true ) ? 'uppercase' : 'none'; ?>;
        }

        /* ---------------------------------------------------------------------
         * Colors
         * ------------------------------------------------------------------ */

        <?php $theme_colors = designr_get_all_theme_colors(); ?>

        /* ----- Primary Color ---------------------------------------------- */

        ul.slim-header-menu > li.current-menu-item > a:before,
        ul.slim-header-menu > li:not(.menu-item-has-children) > a:before,
        div#slim-header ul#mobile-menu:before,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu:before {
            background-color: <?php esc_attr_e( $theme_colors['primary'] ); ?>;
        }

        a,
        div#slim-header a:hover,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu li a:hover {
            color: <?php esc_attr_e( $theme_colors['primary'] ); ?>;
        }

        footer #designr_designer path {
            fill: <?php esc_attr_e($theme_colors['primary']); ?>;
        }
        
        /* ----- Secondary Color -------------------------------------------- */

        a:hover {
            color: <?php esc_attr_e( $theme_colors['secondary'] ); ?>;
        }

        /* ----- Navbar Colors & Image -------------------------------------- */

        <?php if ( get_theme_mod( 'navbar_background_style', 'color' ) == 'color' ) : ?>

            div#slim-header-wrap {
                background-color: <?php esc_attr_e( $theme_colors['navbar_bg'] ); ?>;
            }

        <?php else : ?>

            div#slim-header-wrap {
                background-image: url(<?php echo esc_url( get_theme_mod( 'navbar_bg_image', '' ) ); ?>);
            }

            div#slim-header ul#mobile-menu {
                background-color: <?php esc_attr_e( $theme_colors['navbar_bg'] ); ?>;
            }

        <?php endif; ?>

        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu {
            background-color: <?php esc_attr_e( $theme_colors['navbar_bg'] ); ?>;
        }

        div#slim-header,
        div#slim-header a,
        ul.slim-header-menu > li.current-menu-item > a,
        header#masthead.header-style-split .navbar-social #split-social-trigger {
            color: <?php esc_attr_e( $theme_colors['navbar_fg'] ); ?>;
        }

        a#split-social-trigger path {
            fill: <?php esc_attr_e( $theme_colors['navbar_fg'] ); ?>;
        }

        header#masthead.header-style-split .navbar-social {
            background-color: <?php esc_attr_e( $theme_colors['social_bg'] ); ?>;
        }

        header#masthead.header-style-slim .navbar-social a.navbar-icon,
        header#masthead.header-style-split .navbar-social a.navbar-icon {
            color: <?php esc_attr_e( $theme_colors['social_fg'] ); ?>;
        }

        header#masthead.header-style-slim .navbar-social a.navbar-icon:hover,
        header#masthead.header-style-split .navbar-social a.navbar-icon:hover {
            color: <?php esc_attr_e( $theme_colors['social_fg_hov'] ); ?>;
        }

        /* ----- Custom Header Colors --------------------------------------- */

        div#custom-header-content .custom-header-title,
        div#designr-custom-header.parallax_layers .custom-header-title {
            color: <?php esc_attr_e( $theme_colors['custom_header_title'] ); ?>;
        }

        ul#custom-header-menu > li a {
            color: <?php esc_attr_e( $theme_colors['custom_header_menu'] ); ?>;
        }

        /* ----- Footer Colors ---------------------------------------------- */

        div#pre-footer-wrap {
            border-top: 10px solid <?php esc_attr_e($theme_colors['primary']); ?>;
        }
        
        #pre-footer h2.widget-title {
            color: <?php esc_attr_e( $theme_colors['footer_widget_title'] ); ?>;
        }
        
        div#slim-footer-social {
            background-color: #<?php esc_attr_e( $theme_colors['footer_bg'] ); ?>;
        }

        div#slim-footer,
        div#slim-footer a {
            color: <?php esc_attr_e( $theme_colors['footer_fg'] ); ?>;
        }

        /* ---------------------------------------------------------------------
         * Navbar
         * ------------------------------------------------------------------ */

        <?php if ( get_theme_mod( 'navbar_style', 'default' ) == 'slim_split' || get_theme_mod( 'navbar_style', 'default' ) == 'slim_left' ) : ?>
            @media (min-width: 992px) {
                div#content {
                    padding-top: <?php // esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) + 2 ) ?>px;
                    padding-top: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) - 1 ) ?>px;
                }
                div#content.sticky-header {
                    padding-top: <?php // esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) + 2 ) ?>px;
                    padding-top: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) - 1 ) ?>px;
                }
            }
        <?php endif; ?>

        <?php if ( get_theme_mod( 'style_a_box_shadow', true ) ) : ?>
            div#slim-header-wrap {
                box-shadow: 0px 0px 10px 0px rgba(0,0,0,.75);
            }
        <?php endif; ?>

        /* ----- Slim Headers: Logo Settings -------------------------------- */

        <?php if ( get_theme_mod( 'style_a_always_show_logo', false ) ) : ?>
            header img.custom-logo {
                height: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) ) ?>px;
                margin: 0 <?php esc_attr_e( get_theme_mod( 'style_a_logo_space', 15 ) ) ?>px;
                opacity: 1;
            }
        <?php else : ?>
            header img.custom-logo {
                height: 0px;
                opacity: 0;
            }
        <?php endif; ?>

        .is-sticky img.custom-logo {
            height: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) ) ?>px;
            margin: 0 <?php esc_attr_e( get_theme_mod( 'style_a_logo_space', 15 ) ) ?>px;
        }

        /* ----- Slim Headers: Collapse ------------------------------------- */

        ul.slim-header-menu > li a,
        ul.slim-header-menu > li {
            line-height: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) ) ?>px;
        }

        /* ----- Slim Headers: Expand --------------------------------------- */

        .is-sticky ul.slim-header-menu > li a,
        .is-sticky ul.slim-header-menu > li {
            line-height: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) ) ?>px;
        }

        /* ----- Slim Headers: Site Title ----------------------------------- */

        .site-branding .site-title {
            font-size: <?php esc_attr_e( get_theme_mod( 'navbar_site_title_font_size', 32 ) ) ?>px;
            letter-spacing: <?php esc_attr_e( get_theme_mod( 'navbar_site_title_spacing', '.250' ) ); ?>em;
        }

        <?php if ( get_theme_mod( 'navbar_site_title_font', 'secondary' ) == 'primary' ) : ?>

            .site-branding .site-title,
            div#footer-branding-wrap .site-title {
                font-family: <?php esc_attr_e( get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ); ?>;
            }

        <?php endif; ?>

        /* ----- Slim Headers: Site Description ----------------------------- */

        .site-branding .site-tagline {
            font-size: <?php esc_attr_e( get_theme_mod( 'navbar_site_tagline_font_size', 12 ) ) ?>px;
        }

        <?php if ( get_theme_mod( 'navbar_site_tagline_font', 'secondary' ) == 'primary' ) : ?>

            .site-branding .site-tagline {
                font-family: <?php esc_attr_e( get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ); ?>;
            }

        <?php endif; ?>

        <?php if ( get_theme_mod( 'navbar_hide_tagline', true ) ) : ?>

            .site-branding .site-tagline {
                display: none !important;
            }

        <?php endif; ?>

        /* ----- Slim Headers: Nav Links ------------------------------------ */

        ul.slim-header-menu > li {
            padding: 0 <?php esc_attr_e( intval( get_theme_mod( 'navbar_links_gap_spacing', 30 ) / 2 ) ) ?>px;
        }

        ul#mobile-menu li a,
        ul.slim-header-menu > li a {
            font-size: <?php esc_attr_e( get_theme_mod( 'navbar_links_font_size', 10 ) ) ?>px;
        }

        /* ----- Slim Headers: Left Aligned Logo & Right Aligned Menu ------- */

        <?php if ( get_theme_mod( 'style_a_right_align_menu', false ) ) : ?>
            header#masthead.header-style-slim div#slim-header .right-half {
                justify-content: flex-end;
            }
            @media (min-width:992px) {
                header#masthead.header-style-slim div#slim-header .left-half {
                    display: none;
                }
            }
        <?php endif; ?>

        /* ----- Mobile Nav: Fixed Logo Height ------------------------------ */

        @media (max-width:991px) {
            header img.custom-logo {
                padding: 0;
                height: <?php esc_attr_e( get_theme_mod( 'style_a_mobile_logo_height', 50 ) ) ?>px !important;
            }
        }

        /* ---------------------------------------------------------------------
         * Blog
         * ------------------------------------------------------------------ */

        <?php

        switch ( get_theme_mod( 'blog_layout_num_columns', '3col' ) ) :

            case '1col':
                $col_width = "100%";
                break;
            case '2col':
                $col_width = "50%";
                break;
            case '3col':
                $col_width = "33.333333%";
                break;
            case '4col':
                $col_width = "25%";
                break;
            default :
                $col_width = "33.333333%";

        endswitch;
        ?>

        @media (min-width:1200px) {
            .masonry-card-blog .blog_item_wrap,
            .masonry-card-blog .grid_sizer {
                width: <?php esc_attr_e( $col_width ); ?> !important;
            }
        }

        /* ----- Masonry Blog Cards: Border Radius -------------------------- */

        <?php $card_radius = get_theme_mod( 'blog_layout_border_radius', 0 ); ?>

        .masonry-card-blog .blog_item_wrap img {
            border-radius: <?php esc_attr_e( $card_radius . 'px' . ' ' . $card_radius . 'px' ); ?> 0 0;
        }
        .masonry-card-blog .blog_item_wrap .blog_item,
        .masonry-card-blog .blog_item_wrap {
            border-radius: <?php esc_attr_e( $card_radius ); ?>px;
        }
        .masonry-card-blog .blog_item_wrap .inner-wrap {
            border-radius: 0 0 <?php esc_attr_e( $card_radius . 'px' . ' ' . $card_radius . 'px' ); ?>;
        }

        /* ----- Masonry Blog Cards: Hidden Categories Bar ------------------ */

        <?php if ( ! get_theme_mod( 'blog_layout_show_categories', true ) ) : ?>
            .masonry-card-blog .blog_item_wrap .blog_item .footer-meta {
                padding-bottom: 0;
                border: none;
            }
            .masonry-card-blog .blog_item_wrap .blog_item .inner-wrap {
                padding-bottom: 15px;
            }
            .masonry-card-blog .blog_item_wrap:hover .blog_item .inner-wrap {
                border-radius: 0;
            }
        <?php endif; ?>

        /* ----- Masonry Blog Cards: Hidden Comment & View Counts ----------- */

        <?php if ( ! get_theme_mod( 'blog_layout_show_comment_count', true ) && ! get_theme_mod( 'blog_layout_show_view_count', false ) ) : ?>
            .masonry-card-blog .blog_item_wrap .blog_item .inner {
                padding-bottom: 15px;
            }
        <?php endif; ?>

        /* ----- Masonry Blog Cards: Typography ----------------------------- */

        .masonry-card-blog .blog_item_wrap .blog_item .entry-title {
            font-size: <?php esc_attr_e( get_theme_mod( 'blog_title_font_size_dsk', 32 ) ) ?>px;
        }

        .masonry-card-blog .blog_item_wrap .blog_item .inner .blog-meta {
            font-size: <?php esc_attr_e( get_theme_mod( 'blog_meta_font_size', 12 ) ) ?>px;
        }

        @media (max-width: 767px) {
            .masonry-card-blog .blog_item_wrap .blog_item .entry-title {
                font-size: <?php esc_attr_e( get_theme_mod( 'blog_title_font_size_mbl', 20 ) ) ?>px;
            }
        }

        /* ---------------------------------------------------------------------
         * Custom Header
         * ------------------------------------------------------------------ */

        div#custom-header-content .custom-header-title,
        div#designr-custom-header.parallax_layers .custom-header-title {
            font-size: <?php esc_attr_e( get_theme_mod( 'custom_header_title_font_size', 48 ) ) ?>px;
            letter-spacing: <?php esc_attr_e( get_theme_mod( 'custom_header_title_letter_spacing', '.250' ) ) ?>em;
        }

        ul#custom-header-menu > li a {
            font-size: <?php esc_attr_e( get_theme_mod( 'custom_header_menu_font_size', 10 ) ) ?>px;
            letter-spacing: <?php esc_attr_e( get_theme_mod( 'custom_header_menu_letter_spacing', '.500' ) ) ?>em;
        }

        ul#custom-header-menu > li {
            margin: 2px <?php esc_attr_e( get_theme_mod( 'custom_header_menu_link_spacing', 16 ) / 2 ) ?>px;
        }

        div#designr-custom-header.designr_parallax,
        div#designr-custom-header.designr_parallax .util-tbl-wrap,
        div#designr-custom-header.parallax_layers {
            height: <?php echo get_theme_mod( 'designr_custom_header_height_unit', 'percent' ) == 'percent' ? esc_attr( get_theme_mod( 'designr_custom_header_height_percent', 50 ) . 'vh' ) : esc_attr( get_theme_mod( 'designr_custom_header_height_pixels', 500 ) . 'px' ); ?>;
        }

        /* ----- Perspective Layer ------------------------------------------ */

        div#designr-custom-header.parallax_layers .jparallax-layer.texture-layer,
        div#designr-custom-header.parallax_layers .jparallax-layer.color-layer,
        div#designr-custom-header.parallax_layers .jparallax-layer.image-layer {
            width: 115vw;
            height: <?php echo get_theme_mod( 'designr_custom_header_height_unit', 'percent' ) == 'percent' ? esc_attr( ( get_theme_mod( 'designr_custom_header_height_percent', 50 ) + 15 ) . 'vh' ) : esc_attr( ( get_theme_mod( 'designr_custom_header_height_pixels', 500 ) * 1.15 ) . 'px' ); ?>;
            background-size: cover;
            background-position: 50%;
        }

        div#designr-custom-header.parallax_layers .jparallax-layer.texture-layer {
            opacity: <?php echo esc_attr( get_theme_mod( 'parallax_layers_texture_layer_opacity', .75 ) ); ?>;
        }

        div#designr-custom-header.parallax_layers .jparallax-layer.color-layer {
            opacity: <?php echo esc_attr( get_theme_mod( 'parallax_layers_single_color_opacity', .75 ) ); ?>;
        }

        div#designr-custom-header.designr_parallax div#custom-header-overlay.single,
        div#designr-custom-header.parallax_layers .jparallax-layer.color-layer.single {
            background: <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_single'], get_theme_mod( 'parallax_layers_single_color_opacity', .75 ) ) ); ?>;
        }

        div#designr-custom-header.designr_parallax img.custom-logo,
        div#designr-custom-header.parallax_layers .jparallax-layer.content-layer img.custom-logo {
            height: <?php echo esc_attr( get_theme_mod( 'designr_custom_header_logo_height', 150 ) ); ?>px;
        }

        /* ----- Custom Header - Mobile Heights ----------------------------- */

        @media (max-width: 991px) {

            div#designr-custom-header.designr_parallax,
            div#designr-custom-header.designr_parallax .util-tbl-wrap,
            div#designr-custom-header.parallax_layers {
                height: <?php echo get_theme_mod( 'designr_custom_header_height_unit', 'percent' ) == 'percent' ? esc_attr( get_theme_mod( 'designr_custom_header_height_percent_mbl', 25 ) . 'vh' ) : esc_attr( get_theme_mod( 'designr_custom_header_height_pixels_mbl', 250 ) . 'px' ); ?>;
            }

            div#designr-custom-header.parallax_layers .jparallax-layer.texture-layer,
            div#designr-custom-header.parallax_layers .jparallax-layer.color-layer,
            div#designr-custom-header.parallax_layers .jparallax-layer.image-layer {
                height: <?php echo get_theme_mod( 'designr_custom_header_height_unit', 'percent' ) == 'percent' ? esc_attr( ( get_theme_mod( 'designr_custom_header_height_percent_mbl', 25 ) + 15 ) . 'vh' ) : esc_attr( ( get_theme_mod( 'designr_custom_header_height_pixels_mbl', 250 ) * 1.15 ) . 'px' ); ?>;
            }

            div#designr-custom-header.designr_parallax img.custom-logo,
            div#designr-custom-header.parallax_layers .jparallax-layer.content-layer img.custom-logo {
                height: <?php echo esc_attr( get_theme_mod( 'designr_custom_header_logo_height_mbl', 80 ) ); ?>px;
            }

        }

        /* ----- Match Height : Vertical Scroll Parallax Header Only ----- */
        
        <?php if ( get_theme_mod( 'designr_custom_header_height_unit', 'percent' ) == 'percent' && get_theme_mod( 'designr_custom_header_height_percent', 50 ) == 100 && get_theme_mod( 'custom_header_style_toggle', 'parallax_vertical' ) == 'parallax_vertical' ) : ?>
        
            div#designr-custom-header.designr_parallax,
            div#designr-custom-header.designr_parallax .util-tbl-wrap {
                height: calc(100vh - <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) - 1 ) ?>px);
            }
            
            body.admin-bar div#designr-custom-header.designr_parallax,
            body.admin-bar div#designr-custom-header.designr_parallax .util-tbl-wrap {
                height: calc(100vh - <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) - 1 + 32 ) ?>px);
            }

        <?php endif; ?>
        
        /* ----- Perspective Layer - Gradient Overlay ----------------------- */

        <?php
        switch ( get_theme_mod( 'parallax_layers_gradient_linear_direction', 'up' ) ) :

            case 'down':
                $linear_degrees = '180deg';
                break;

            case 'right':
                $linear_degrees = '90deg';
                break;

            case 'left':
                $linear_degrees = '-90deg';
                break;

            default:
                $linear_degrees = '0deg';
                break;

        endswitch; ?>

        div#designr-custom-header.designr_parallax div#custom-header-overlay.gradient,
        div#designr-custom-header.parallax_layers .jparallax-layer.color-layer.gradient {
            <?php if ( get_theme_mod( 'parallax_layers_gradient_style', 'linear' ) == 'linear' ) : ?>

                background: -moz-linear-gradient(<?php echo esc_attr( $linear_degrees ); ?>,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( 'parallax_layers_gradient_start_color_opacity', .75 ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( 'parallax_layers_gradient_end_color_opacity', .25 ) ) ); ?> 100%);
                background: -webkit-linear-gradient(<?php echo esc_attr( $linear_degrees ); ?>,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( 'parallax_layers_gradient_start_color_opacity', .75 ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( 'parallax_layers_gradient_end_color_opacity', .25 ) ) ); ?> 100%);
                background: linear-gradient(<?php echo esc_attr( $linear_degrees ); ?>,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( 'parallax_layers_gradient_start_color_opacity', .75 ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( 'parallax_layers_gradient_end_color_opacity', .25 ) ) ); ?> 100%);

            <?php else : ?>

                background: -moz-radial-gradient(center, ellipse cover,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( 'parallax_layers_gradient_start_color_opacity', .75 ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( 'parallax_layers_gradient_end_color_opacity', .25 ) ) ); ?> 100%);
                background: -webkit-radial-gradient(center, ellipse cover,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( 'parallax_layers_gradient_start_color_opacity', .75 ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( 'parallax_layers_gradient_end_color_opacity', .25 ) ) ); ?> 100%);
                background: radial-gradient(center, ellipse cover,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( 'parallax_layers_gradient_start_color_opacity', .75 ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( 'parallax_layers_gradient_end_color_opacity', .25 ) ) ); ?> 100%);

            <?php endif; ?>
            opacity: <?php echo esc_attr( get_theme_mod( 'parallax_layers_gradient_overall_opacity', .75 ) ); ?>;
        }

        /* ---------------------------------------------------------------------
         * Footer
         * ------------------------------------------------------------------ */

        #pre-footer h2.widget-title {
            font-size: <?php esc_attr_e( get_theme_mod( 'prefooter_widget_title_font_size', 24 ) ) ?>px;
            letter-spacing: <?php esc_attr_e( get_theme_mod( 'prefooter_widget_title_letter_spacing', '.250' ) ); ?>em;
        }
        
        footer div#footer-branding-wrap img.custom-logo {
            height: <?php echo esc_attr( get_theme_mod( 'designr_footer_logo_height', 30 ) ); ?>px;
        }
        
        div#footer-branding-wrap .site-title {
            font-size: <?php esc_attr_e( get_theme_mod( 'footer_site_title_font_size', 18 ) ) ?>px;
            letter-spacing: <?php esc_attr_e( get_theme_mod( 'navbar_site_title_spacing', '.250' ) ); ?>em;
        }

        footer div#footer-branding-wrap {
            font-size: <?php esc_attr_e( get_theme_mod( 'footer_copyright_font_size', 12 ) ) ?>px;
        }

        <?php if ( ! get_theme_mod( 'footer_show_branding', true ) && ! get_theme_mod( 'footer_show_copyright', true ) ) : ?>
            footer span.designr_by {
                padding-left: 0;
                border-left: none;
            }
        <?php endif; ?>
        
        <?php if ( get_theme_mod( 'footer_show_branding', true ) && ! get_theme_mod( 'footer_show_copyright', true ) ) : ?>
        
            footer span.designr_by {
                margin-left: 15px;
            }
        
        <?php endif; ?>
            
    </style>

<?php
}
add_action( 'wp_head', 'designr_wp_head_styles' );
