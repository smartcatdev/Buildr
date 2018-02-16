<?php

/**
 * Designr Theme Customizer
 *
 * @package Designr
 */
include_once get_template_directory() . '/inc/lib/Acid/acid.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function designr_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array (
            'selector' => '.site-title a',
            'render_callback' => 'designr_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array (
            'selector' => '.site-description',
            'render_callback' => 'designr_customize_partial_blogdescription',
        ) );
    }
}

add_action( 'customize_register', 'designr_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function designr_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function designr_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function designr_customize_preview_js() {
    wp_enqueue_script( 'designr-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array ( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'designr_customize_preview_js' );



$acid = acid_instance();

$data = array (
    
    'panels' => array (
        
        // Panel: Navbar -------------------------------------------------------
        'panel-navbar' => array ( 
            
            'title' => __( 'Navbar', 'designr' ),
            'desciption' => __( 'Customize the primary navbar on your site, including control over appearance & behaviour', 'designr' ),
            'sections' => array (
                
                // Navbar Colors
                'section-nav-colors' => array (
                    
                    'title' => __( 'Navbar Colors', 'designr' ),
                    'options' => array (
                        'navbar_background' => array (
                            'type' => 'select',
                            'label' => __( 'Background Color', 'designr' ),
                            'default' => '#141414',
                            'choices' => array (
                                '#141414' => __( 'Dark', 'designr' ),
                                '#ffffff' => __( 'Light', 'designr' ),
                            )
                        ),
                        'navbar_foreground' => array (
                            'type' => 'select',
                            'label' => __( 'Background Color', 'designr' ),
                            'default' => '#ffffff',
                            'choices' => array (
                                '#141414' => __( 'Dark', 'designr' ),
                                '#ffffff' => __( 'Light', 'designr' ),
                            )
                        )
                    )
                    
                ), // End of Navbar Colors Section
                
            ), // End of Navbar Sections
            
        ), // End of Navbar Panel
        
        // Panel: Appearance ---------------------------------------------------
        'panel-appearance' => array ( 
            
            'title' => __( 'Appearance', 'designr' ),
            'description' => __( 'Customize your site colors, fonts, and more', 'designr' ),
            'sections' => array (
                
                // Colors Section
                'section-colors' => array ( 
                    
                    'title' => __( 'Colors', 'designr' ),
                    'description' => __( 'Customize the colors in use on your site', 'designr' ),
                    'options' => array (
                        'skin_theme_primary' => array(
                            'type' => 'select',
                            'label' => __( 'Theme Color - Primary', 'designr' ),
                            'default' => '#0000FF',
                            'choices' => array(
                                '#0000FF'       => __( 'Blue', 'designr' ),
                                '#00FF00'       => __( 'Green', 'designr' ),
                                '#FF0000'       => __( 'Red', 'designr' ),
                            ),
                        ),
                        'skin_theme_secondary' => array(
                            'type' => 'select',
                            'label' => __( 'Theme Color - Secondary', 'designr' ),
                            'default' => '#00FF00',
                            'choices' => array(
                                '#0000FF'       => __( 'Blue', 'designr' ),
                                '#00FF00'       => __( 'Green', 'designr' ),
                                '#FF0000'       => __( 'Red', 'designr' ),
                            ),
                        ),
                    ),
                    
                ), // End of Color Section
                
                // Fonts Section
                'fonts' => array ( 
                    
                    'title' => __( 'Fonts', 'designr' ),
                    'description' => __( 'Customize the fonts in use on your site', 'designr' ),
                    'options' => array (
                        
                        // Primary Font
                        'primary_font' => array(
                            'type' => 'select',
                            'label' => __( 'Primary Font (Headings & Titles)', 'designr' ),
                            'default' => 'Montserrat, sans-serif',
                            'choices' => designr_fonts(),
                        ),
//                        'h1_font_size' => array(
//                            'type' => 'number',
//                            'label' => __( 'Font Size - h1', 'designr' ),
//                            'default' => 16,
//                        ),
                        
                        // Secondary Font
                        'secondary_font' => array(
                            'type' => 'select',
                            'label' => __( 'Secondary Font (Body & Paragraph)', 'designr' ),
                            'default' => 'Abel, sans-serif',
                            'choices' => designr_fonts(),
                        ),
                        'body_font_size' => array(
                            'type' => 'number',
                            'label' => __( 'Font Size - Body & Paragraph', 'designr' ),
                            'default' => 16,
                        ),
                        
                    ),
                    
                ), // End of Fonts Section
                
            ), // End of Appearance Sections
            
        ), // End of Appearance Panel
        
        // Panel: Footer -------------------------------------------------------
        'panel-footer' => array (
            'title' => __( 'Footer', 'designr' ),
            'desciption' => __( 'Customize the theme footer', 'designr' ),
            'sections' =>
            array (
                'section-footer-colors' =>
                array (
                    'title' => __( 'Footer colors', 'designr' ),
                    'options' =>
                    array (
                        'footer-bg' =>
                        array (
                            'type' => 'select',
                            'label' => __( 'Footer background color', 'designr' ),
                            'default' => '#414141',
                            'choices' => array (
                                '#414141' => __( 'Dark', 'designr' ),
                                '#f0f0f0' => __( 'Light', 'designr' ),
                            )
                        )
                    )
                ),
            ),
        ),
        
    ), // End of Panels
    
);

//$data = array (
//    'panels' =>
//    // Navbar Panel
//    array (
//        'panel-navbar' =>


//        // Appearance Panel
//        'panel-appearance' =>
//        array (
//            'title' => __( 'Appearance', 'designr' ),
//            'description' => __( 'Colors, fonts and other global appearance settings', 'designr' ),
//            'sections' =>
//            array (
//                'section-skin-colors' =>
//                array (
//                    'title' => __( 'Skin colors', 'designr' ),
//                    'description' => __( 'Control the general skin colors of the theme', 'designr' ),
//                    'options' =>
//                    array (
//                        'primary-color' =>
//                        array (
//                            'type' => 'select',
//                            'label' => __( 'Primary Color', 'designr' ),
//                            'default' => '#333',
//                            'choices' => array (
//                                '#333' => __( 'Black', 'designr' ),
//                                '#cc0000' => __( 'Red', 'designr' ),
//                                '#44111' => __( 'Black 2', 'designr' ),
//                            ),
//                        ),
//                        'secondary-color' =>
//                        array (
//                            'type' => 'select',
//                            'label' => __( 'Secondary Color', 'designr' ),
//                            'default' => '#333',
//                            'choices' => array (
//                                '#333' => __( 'Black', 'designr' ),
//                                '#cc0000' => __( 'Red', 'designr' ),
//                                '#44111' => __( 'Black 2', 'designr' ),
//                            ),
//                        ),
//                    ),
//                ),
//                'section-fonts' =>
//                array (
//                    'title' => __( 'Fonts', 'designr' ),
//                    'description' => __( 'Customize fonts & font sizes', 'designr' ),
//                    'options' =>
//                    array (
//                        'primary-font' =>
//                        array (
//                            'type' => 'select',
//                            'label' => __( 'Primary Font', 'designr' ),
//                            'default' => 'Abel, sans-serif',
//                            'choices' => designr_fonts()
//                        ),
//                        'secondary-font' =>
//                        array (
//                            'type' => 'select',
//                            'label' => __( 'Secondary Font', 'designr' ),
//                            'default' => 'Voltaire, sans-serif',
//                            'choices' => designr_fonts()
//                        ),
//                        'h1-font-size' =>
//                        array (
//                            'type' => 'number',
//                            'label' => __( 'H1 Header font size', 'designr' ),
//                            'default' => 34
//                        ),
//                        'h2-font-size' =>
//                        array (
//                            'type' => 'number',
//                            'label' => __( 'H2 Header font size', 'designr' ),
//                            'default' => 30
//                        ),
//                        'body-font-size' =>
//                        array (
//                            'type' => 'number',
//                            'label' => __( 'Body font size', 'designr' ),
//                            'default' => 18
//                        ),
//                        'menu-font-size' =>
//                        array (
//                            'type' => 'number',
//                            'label' => __( 'Menu font size', 'designr' ),
//                            'default' => 16
//                        ),
//                    ),
//                ),
//            ),
//        ),
//    ),
//);

$acid->config( $data );