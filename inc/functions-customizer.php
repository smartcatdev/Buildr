<?php

/**
 * Designr Theme Customizer
 *
 * @package Designr
 */

include_once get_stylesheet_directory() . '/inc/lib/Acid/acid.php';


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
    'panels' =>
    // Navbar Panel
    array (
        'panel-navbar' =>
        array(
            'title'         => __( 'Navbar', 'designr' ),
            'desciption'    => __( 'Customize the site top menu navbar. This includes settings to control how the navbar & logo behave', 'designr' ),
            'sections'      =>
            array(
                'section-nav-colors' =>
                array(
                    'title'     => __( 'Navbar colors', 'designr' ),
                    'options'   =>
                    array(
                        'navbar-bg' =>
                        array(
                            'type'      => 'select',
                            'label'     => __( 'Navbar background color', 'designr' ),
                            'default'   => '#414141',
                            'choices'   => array(
                                '#414141'       => __( 'Dark', 'designr' ),
                                '#f0f0f0'       => __( 'Light', 'designr' ),
                                
                            )
                        )
                    )
                ),
            ),
        ),
    ),
    // Footer Panel
    array(
        'panel-footer' =>
        array(
            'title'         => __( 'Footer', 'designr' ),
            'desciption'    => __( 'Customize the theme footer', 'designr' ),
            'sections'      =>
            array(
                'section-footer-colors' =>
                array(
                    'title'     => __( 'Footer colors', 'designr' ),
                    'options'   =>
                    array(
                        'footer-bg' =>
                        array(
                            'type'      => 'select',
                            'label'     => __( 'Footer background color', 'designr' ),
                            'default'   => '#414141',
                            'choices'   => array(
                                '#414141'       => __( 'Dark', 'designr' ),
                                '#f0f0f0'       => __( 'Light', 'designr' ),
                                
                            )
                        )
                    )
                ),
            ),
        ),
    ),
    // Appearance Panel
    array(
        'panel-appearance' =>
        array (
            'title' => __( 'Appearance', 'designr' ),
            'description' => __( 'Colors, fonts and other global appearance settings', 'designr' ),
            'sections' =>
            array (
                'section-skin-colors' =>
                array (
                    'title' => __( 'Skin colors', 'designr' ),
                    'description' => __( 'Control the general skin colors of the theme', 'designr' ),
                    'options' =>
                    array (
                        'primary-color' =>
                        array (
                            'type'      => 'select',
                            'label'     => __( 'Primary Color', 'designr' ),
                            'default'   => '#333',
                            'choices'   => array(
                                '#333'          => __( 'Black', 'designr' ),
                                '#cc0000'       => __( 'Red', 'designr' ),
                                '#44111'        => __( 'Black 2', 'designr' ),
                            ),
                        ),
                        'secondary-color' =>
                        array (
                            'type'      => 'select',
                            'label'     => __( 'Secondary Color', 'designr' ),
                            'default'   => '#333',
                            'choices'   => array(
                                '#333'          => __( 'Black', 'designr' ),
                                '#cc0000'       => __( 'Red', 'designr' ),
                                '#44111'        => __( 'Black 2', 'designr' ),
                            ),
                        ),
                    ),
                ),
                'section-fonts' =>
                array(
                    'title' => __( 'Fonts', 'designr' ),
                    'description' => __( 'Customize fonts & font sizes', 'designr' ),
                    'options' =>
                    array(
                        'primary-font' =>
                        array (
                            'type'      => 'select',
                            'label'     => __( 'Primary Font', 'designr' ),
                            'default'   => 'Abel, sans-serif',
                            'choices'   => designr_fonts()
                        ),
                        'secondary-font' =>
                        array (
                            'type'      => 'select',
                            'label'     => __( 'Secondary Font', 'designr' ),
                            'default'   => 'Voltaire, sans-serif',
                            'choices'   => designr_fonts()
                        ),
                        'h1-font-size' => 
                        array(
                            'type'      => 'number',
                            'label'     => __( 'H1 Header font size', 'designr' ),
                            'default'   => 34
                        ),
                        'h2-font-size' => 
                        array(
                            'type'      => 'number',
                            'label'     => __( 'H2 Header font size', 'designr' ),
                            'default'   => 30
                        ),
                        'body-font-size' => 
                        array(
                            'type'      => 'number',
                            'label'     => __( 'Body font size', 'designr' ),
                            'default'   => 18
                        ),
                        'menu-font-size' => 
                        array(
                            'type'      => 'number',
                            'label'     => __( 'Menu font size', 'designr' ),
                            'default'   => 16
                        ),
                    ),
                ),
            ),
        ),  
    ),
);

$acid->config( $data );


//                        'text-4' =>
//                        array (
//                            'type' => 'number',
//                            'label' => '',
//                            'default' => 15,
//                        ),
//                        'select-1' =>
//                        array (
//                            'type' => 'date',
//                            'label' => '',
//                            'default' => 'Default value',
//                        ),
//                        'select-2' =>
//                        array (
//                            'type' => 'checkbox',
//                            'label' => 'do you want things?',
//                            'default' => true,
//                        ),
//                        'select-3' =>
//                        array (
//                            'type' => 'radio',
//                            'label' => 'do you want things?',
//                            'default' => 'red',
//                            'choices' => array (
//                                'red' => __( 'Red', 'themeslug' ),
//                                'white' => __( 'white', 'themeslug' ),
//                                'orange' => __( 'Orange', 'themeslug' ),
//                            ),
//                        ),
//                        'select-4' =>
//                        array (
//                            'type' => 'select',
//                            'label' => 'Select dropdown',
//                            'default' => 'white',
//                            'choices' => array (
//                                'red' => __( 'Red', 'themeslug' ),
//                                'white' => __( 'white', 'themeslug' ),
//                                'orange' => __( 'Orange', 'themeslug' ),
//                            ),
//                        ),
//                        'select-5' =>
//                        array (
//                            'type' => 'color',
//                            'label' => 'text color',
//                            'default' => '#333',
//                        ),
//                        'select-6' =>
//                        array (
//                            'type' => 'image',
//                            'label' => 'bg image',
//                            'default' => 'this',
//                        ),
//                        'slider-image' =>
//                        array (
//                            'type' => 'image',
//                            'label' => 'bg image',
//                            'default' => 'this',
//                        ),
//                        'select-7' =>
//                        array (
//                            'type' => 'dropdown-pages',
//                            'label' => 'bg image',
//                            'default' => 1,
//                        ),