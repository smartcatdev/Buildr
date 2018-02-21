<?php

/**
 * Enqueue scripts and styles.
 */
function designr_wp_head_styles() { ?>
    
    <style type="text/css">

        <?php $theme_colors = designr_get_all_theme_colors(); ?>
        
        div#slim-header,
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
        
        div#slim-header a:hover,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu li a:hover {
            color: #<?php esc_attr_e( $theme_colors['primary'] ); ?>;   
        }
        
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
        
    </style>
    
<?php
}
add_action( 'wp_head', 'designr_wp_head_styles' );
