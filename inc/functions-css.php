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
        .site-branding .site-title {
            font-family: <?php esc_attr_e( get_theme_mod( 'secondary_font', 'Abel, sans-serif' ) ); ?>;
        }
        
        h1,h2,h3,h4,h5,h6,
        ul#mobile-menu li a,
        ul.slim-header-menu > li a,
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
        
        /* --------------------------------------------------------------------- 
         * Colors
         * ------------------------------------------------------------------ */
        
        <?php $theme_colors = designr_get_all_theme_colors(); ?>
        
        /* ----- Primary Color ---------------------------------------------- */
        
        ul.slim-header-menu > li.current-menu-item > a:before,
        ul.slim-header-menu > li:not(.menu-item-has-children) > a:before,
        div#slim-header ul#mobile-menu:before,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu:before { 
            background-color: #<?php esc_attr_e( $theme_colors['primary'] ); ?>;
        }
        
        a,
        div#slim-header a:hover,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu li a:hover {
            color: #<?php esc_attr_e( $theme_colors['primary'] ); ?>;   
        }
        
        /* ----- Secondary Color -------------------------------------------- */
        
        a:hover {
            color: #<?php esc_attr_e( $theme_colors['secondary'] ); ?>;   
        }
        
        /* ----- Navbar Colors & Image -------------------------------------- */
        
        <?php if ( get_theme_mod( 'navbar_background_style', 'color' ) == 'color' ) : ?>
        
            div#slim-header-wrap {
                background-color: #<?php esc_attr_e( $theme_colors['navbar_bg'] ); ?>;
            }
        
        <?php else : ?>
            
            div#slim-header-wrap {
                background-image: url(<?php echo esc_url( get_theme_mod( 'navbar_bg_image', '' ) ); ?>);
            }
            
            div#slim-header ul#mobile-menu {
                background-color: #<?php esc_attr_e( $theme_colors['navbar_bg'] ); ?>;
            }
            
        <?php endif; ?>
        
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu {
            background-color: #<?php esc_attr_e( $theme_colors['navbar_bg'] ); ?>;
        }
        
        div#slim-header,
        div#slim-header a,
        ul.slim-header-menu > li.current-menu-item > a {
            color: #<?php esc_attr_e( $theme_colors['navbar_fg'] ); ?>;
        }
        
        /* --------------------------------------------------------------------- 
         * Navbar
         * ------------------------------------------------------------------ */
        
        <?php if ( get_theme_mod( 'navbar_style', 'default' ) == 'slim_split' || get_theme_mod( 'navbar_style', 'default' ) == 'slim_left' ) : ?>
            @media (min-width: 992px) {
                div#content {
                    padding-top: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) + 2 ) ?>px;
                }
                div#content.sticky-header {
                    padding-top: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) + 2 ) ?>px;
                }
            }
        <?php endif; ?>

        <?php if ( get_theme_mod( 'style_a_box_shadow', 'yes' ) == 'yes' ) : ?>
            div#slim-header-wrap {
                box-shadow: 0px 0px 10px 0px rgba(0,0,0,.75);
            }
        <?php endif; ?>
        
        /* ----- Slim Headers: Logo Settings -------------------------------- */
            
        <?php if ( get_theme_mod( 'style_a_always_show_logo', 'no' ) == 'yes' ) : ?>
            img.custom-logo {
                height: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) ) ?>px;
                margin: 0 <?php esc_attr_e( get_theme_mod( 'style_a_logo_space', 15 ) ) ?>px;
                opacity: 1;
            }
        <?php else : ?>
            img.custom-logo {
                height: 0px;
                opacity: 0;
            }
        <?php endif; ?>
        
        .is-sticky img.custom-logo {
            height: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) ) ?>px;
            margin: 0 <?php esc_attr_e( get_theme_mod( 'style_a_logo_space', 15 ) ) ?>px;
        }

        /* ----- Slim Headers: Collapse ------------------------------------- */
        
        ul.slim-header-menu > li {
            line-height: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) ) ?>px;
        }
        
        /* ----- Slim Headers: Expand --------------------------------------- */
        
        .is-sticky ul.slim-header-menu > li {
            line-height: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) ) ?>px;
        }
        
        /* ----- Slim Headers: Split Social Height -------------------------- */
        
        header#masthead.header-style-split .navbar-social {
            height: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) + 2 ) ?>px;
        }
        
        header#masthead.header-style-split .is-sticky .navbar-social {
            height: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) + 2 ) ?>px;
        }
        
        /* ----- Slim Headers: Site Title ----------------------------------- */
        
        .site-branding .site-title {
            font-size: <?php esc_attr_e( get_theme_mod( 'navbar_site_title_font_size', 32 ) ) ?>px;
            letter-spacing: <?php esc_attr_e( get_theme_mod( 'navbar_site_title_spacing', '0.0' ) ); ?>em;
        }
        
        <?php if ( get_theme_mod( 'navbar_site_title_font', 'secondary' ) == 'primary' ) : ?>
        
            .site-branding .site-title {
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
        
        <?php if ( get_theme_mod( 'navbar_hide_tagline', 'no' ) == 'yes' ) : ?>
        
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
        
        <?php if ( get_theme_mod( 'style_a_right_align_menu', 'no' ) == 'yes' ) : ?>
            header#masthead.header-style-slim div#slim-header .right-half {
                justify-content: flex-end;
            }
            header#masthead.header-style-slim div#slim-header .left-half {
                display: none;
            }            
        <?php endif; ?>
        
        /* ----- Mobile Nav: Fixed Logo Height ------------------------------ */
        
        @media (max-width:991px) {
            img.custom-logo {
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
        
        .masonry-card-blog .blog_item_wrap,
        .masonry-card-blog .grid_sizer {
            width: <?php esc_attr_e( $col_width ); ?>;
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
        
        <?php if ( get_theme_mod( 'blog_layout_show_categories', 'yes' ) == 'no' ) : ?>
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
        
        <?php if ( get_theme_mod( 'blog_layout_show_comment_count', 'yes' ) == 'no' && get_theme_mod( 'blog_layout_show_view_count', 'yes' ) == 'no' ) : ?>
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
        
    </style>
    
<?php
}
add_action( 'wp_head', 'designr_wp_head_styles' );
