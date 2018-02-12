<?php


// Register sidebars
add_action( 'widgets_init', 'designr_widgets_init' );


/**
 * Register widget area.
 *
 */
function designr_widgets_init() {
    
    register_sidebar( array (
        'name' => esc_html__( 'Sidebar', 'designr' ),
        'id' => 'sidebar-right',
        'description' => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
    
}


