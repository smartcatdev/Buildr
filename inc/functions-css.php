<?php

/**
 * Enqueue scripts and styles.
 */
function designr_wp_head_styles() { ?>
    
    <style type="text/css">

        <?php $theme_colors = designr_get_all_theme_colors(); ?>
        
        div#slim-header,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu {
            background-color: <?php esc_attr_e( $theme_colors['navbar_bg'] ); ?>;
        }
        
        div#slim-header,
        div#slim-header a {
            color: <?php esc_attr_e( $theme_colors['navbar_fg'] ); ?>;
        }
        
        ul.slim-header-menu > li:not(.menu-item-has-children) > a:before,
        div#slim-header ul#mobile-menu:before,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu:before { 
            background-color: <?php esc_attr_e( $theme_colors['primary'] ); ?>;
        }
        
        div#slim-header a:hover,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu li a:hover {
            color: <?php esc_attr_e( $theme_colors['primary'] ); ?>;   
        }
        
        
    </style>
    
<?php
}
add_action( 'wp_head', 'designr_wp_head_styles' );
