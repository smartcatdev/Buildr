<?php

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Tyros_Customize {

    /**
     * Returns the instance.
     *
     * @since  1.0.0
     * @access public
     * @return object
     */
    public static function get_instance() {

        static $instance = null;

        if ( is_null( $instance ) ) {
            $instance = new self;
            $instance->setup_actions();
        }

        return $instance;
    }

    /**
     * Constructor method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function __construct() {
        
    }

    /**
     * Sets up initial actions.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setup_actions() {

        // Register panels, sections, settings, controls, and partials.
        add_action( 'customize_register', array ( $this, 'sections' ) );

        // Register scripts and styles for the controls.
        add_action( 'customize_controls_enqueue_scripts', array ( $this, 'enqueue_control_scripts' ), 0 );
    }

    /**
     * Sets up the customizer sections.
     *
     * @since  1.0.0
     * @access public
     * @param  object  $manager
     * @return void
     */
    public function sections( $manager ) {

        // Load custom sections.
        require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/example-1/section-pro.php' );

        // Register custom section types.
        $manager->register_section_type( 'Tyros_Customize_Section_Pro' );

        // Register sections.
        $manager->add_section(
            new Tyros_Customize_Section_Pro(
                $manager, 'tyros_pro', array (
                    'title' => esc_html__( 'Tyros Pro', 'tyros' ),
                    'pro_text' => esc_html__( 'View Tyros Pro', 'tyros' ),
                    'pro_url' => 'http://tyros.smartcatdev.wpengine.com/?utm_source=Theme%20Customizer&utm_medium=CTA&utm_campaign=Free%20Version%20Users',
                    'pro_details' => esc_html__( 'The pro version includes an advanced slider up to 6 slides, Events, FAQ, Gallery, News and Testimonials widgets and templates, Pricing Table, Contact Widgets, Alternate Blog Desings, 200+ Google fonts, unlimited skin colors and more!', 'tyros' ),
                )
            )
        );
    }

    /**
     * Loads theme customizer CSS.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue_control_scripts() {

        wp_enqueue_script( 'tyros-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . 'trt-customize-pro/example-1/customize-controls.js', array ( 'customize-controls' ) );

        wp_enqueue_style( 'tyros-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . 'trt-customize-pro/example-1/customize-controls.css' );
    }

}

// Doing this customizer thang!
Tyros_Customize::get_instance();
