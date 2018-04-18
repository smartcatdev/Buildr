<?php

function buildr_theme_customize_controls_js() {
    
    wp_enqueue_script( 'buildr-theme-customizer-control', buildr_theme_url( '/assets/admin/js/customizer-control.js' ), array ( 'jquery', 'customize-controls' ), BUILDR_VERSION, true );
    
    wp_localize_script( 'buildr-theme-customizer-control', 'buildr_customize', array(
        'ajax_url'                  => admin_url( 'admin-ajax.php' ),
        'buildr_dismiss_nonce'      => wp_create_nonce( 'buildr_dismiss_nonce' )
    ) );
    
}
add_action( 'customize_controls_enqueue_scripts', 'buildr_theme_customize_controls_js' );