<?php

/**
 * Enqueue scripts and styles.
 */
function designr_wp_head_styles() { ?>
    
    <style type="text/css">

        /* ----- TYPOGRAPHY ----- */
        
        body {
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
        
        /* ----- COLORS ----- */
        
        <?php $theme_colors = designr_get_all_theme_colors(); ?>
        
        <?php if ( get_theme_mod( 'navbar_background_style', 'color' ) == 'color' ) : ?>
        
            div#slim-header {
                background-color: #<?php esc_attr_e( $theme_colors['navbar_bg'] ); ?>;
            }
        
        <?php else : ?>
            
            div#slim-header {
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
        div#slim-header a {
            color: #<?php esc_attr_e( $theme_colors['navbar_fg'] ); ?>;
        }
        
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
        
        a:hover {
            color: #<?php esc_attr_e( $theme_colors['secondary'] ); ?>;   
        }
        
        /* ----- NAVBAR ----- */
        
        <?php if ( get_theme_mod( 'navbar_style', 'default' ) == 'custom_a' ) : ?>
            @media (min-width: 992px) {
                div#content {
                    padding-top: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) + 2 ) ?>px;
                }
                div#content.sticky-header {
                    padding-top: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) + 2 ) ?>px;
                }
            }
        <?php endif; ?>
        
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

        ul.slim-header-menu > li {
            line-height: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) ) ?>px;
        }
        
        .is-sticky ul.slim-header-menu > li {
            line-height: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) ) ?>px;
        }
        
        @media (max-width:991px) {
            img.custom-logo {
                padding: 0;
                height: <?php esc_attr_e( get_theme_mod( 'style_a_mobile_logo_height', 50 ) ) ?>px !important;
            }
        }
        
        /* ----- BLOG ----- */
        
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
        
        .masonry-card-blog .blog_item_wrap .blog_item .entry-title {
            font-size: <?php esc_attr_e( get_theme_mod( 'blog_title_font_size_dsk', 32 ) ) ?>px;
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
