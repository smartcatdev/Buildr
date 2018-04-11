<?php

// Register sidebars
add_action( 'widgets_init', 'designr_widgets_init' );


/**
 * Register widget area.
 *
 */
function designr_widgets_init() {

    register_sidebar( array (
        'name'              => esc_html__( 'Footer', 'designr' ),
        'id'                => 'sidebar-footer',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="' . 'col-sm-' . esc_attr( 12 / get_theme_mod( DESIGNR_OPTIONS::FOOTER_NUM_WIDGET_COLS, DESIGNR_DEFAULTS::FOOTER_NUM_WIDGET_COLS ) ) . ' widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Frontpage - Above Content', 'designr' ),
        'id'                => 'sidebar-front-above',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Frontpage - Below Content', 'designr' ),
        'id'                => 'sidebar-front-below',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Blog - Above Content', 'designr' ),
        'id'                => 'sidebar-blog-above',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Blog - Below Content', 'designr' ),
        'id'                => 'sidebar-blog-below',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Post - Above Content', 'designr' ),
        'id'                => 'sidebar-post-above',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Post - Below Content', 'designr' ),
        'id'                => 'sidebar-post-below',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page - Above Content', 'designr' ),
        'id'                => 'sidebar-page-above',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page - Below Content', 'designr' ),
        'id'                => 'sidebar-page-below',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template A - Above Content', 'designr' ),
        'id'                => 'sidebar-page-a-above',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template A - Below Content', 'designr' ),
        'id'                => 'sidebar-page-a-below',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template B - Above Content', 'designr' ),
        'id'                => 'sidebar-page-b-above',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template B - Below Content', 'designr' ),
        'id'                => 'sidebar-page-b-below',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template C - Above Content', 'designr' ),
        'id'                => 'sidebar-page-c-above',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template C - Below Content', 'designr' ),
        'id'                => 'sidebar-page-c-below',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Landing Page A', 'designr' ),
        'id'                => 'sidebar-page-landing-a',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Landing Page B', 'designr' ),
        'id'                => 'sidebar-page-landing-b',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Landing Page C', 'designr' ),
        'id'                => 'sidebar-page-landing-c',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    
    
    register_sidebar( array (
        'name'              => esc_html__( 'Shop - Above Content', 'designr' ),
        'id'                => 'sidebar-shop-above',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Shop - Below Content', 'designr' ),
        'id'                => 'sidebar-shop-below',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Shop', 'designr' ),
        'id'                => 'sidebar-shop',
        'description'       => esc_html__( 'Add widgets here.', 'designr' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
}