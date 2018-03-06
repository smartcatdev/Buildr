<?php

// Register sidebars
add_action( 'widgets_init', 'designr_widgets_init' );


/**
 * Register widget area.
 *
 */
function designr_widgets_init() {
    
    register_sidebar( array (
        'name'              => esc_html__( 'Sidebar A', 'designr' ),
        'id'                => 'sidebar-a',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<section id="%1$s" class="widget %2$s">',
        'after_widget'      => '</section>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ) );

    register_sidebar( array (
        'name'              => esc_html__( 'Footer', 'designr' ),
        'id'                => 'sidebar-footer',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="' . 'col-sm-' . esc_attr( 12 / get_theme_mod( 'footer_num_columns', 4 ) ) . ' widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
}