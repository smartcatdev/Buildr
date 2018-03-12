<?php


// Adds custom classes to the array of body classes.
add_filter( 'body_class', 'designr_body_classes' );

// Add a pingback url auto-discovery header for singularly identifiable articles.
add_action( 'wp_head', 'designr_pingback_header' );

// Set up theme defaults and register various theme support
add_action( 'after_setup_theme', 'designr_setup' );

// Define content width
add_action( 'after_setup_theme', 'designr_content_width', 0 );

/**
 * Adds custom classes to the array of body classes.
 * 
 * @param array $classes Classes for the body element.
 * @return array
 */
function designr_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( !is_singular() ) {
        $classes[] = 'hfeed';
    }

    return $classes;
}


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function designr_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}


/**
 * Designr functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Designr
 */
if ( !function_exists( 'designr_setup' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function designr_setup() {
    
        if( !defined( 'DESIGNR_VERSION' ) ) :
            define( 'DESIGNR_VERSION', '1.0.0' );
        endif;
        
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Designr, use a find and replace
         * to change 'designr' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'designr', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary-menu'              => esc_html__( 'Primary', 'designr' ),
            'banner-primary'            => esc_html__( 'Navbar: Banner - Primary', 'designr' ),
            'slim-primary'              => esc_html__( 'Navbar: Slim - Primary', 'designr' ),
            'split-primary-left'        => esc_html__( 'Navbar: Split - Left', 'designr' ),
            'split-primary-right'       => esc_html__( 'Navbar: Split - Right', 'designr' ),
            'mobile-menu'               => esc_html__( 'Mobile', 'designr' ),
            'custom-header'             => esc_html__( 'Custom Header', 'designr' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array (
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
//        add_theme_support( 'custom-background', apply_filters( 'designr_custom_background_args', array (
//            'default-color' => 'ffffff',
//            'default-image' => '',
//        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array (
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ) );
    }

endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function designr_content_width() {
    $GLOBALS[ 'content_width' ] = apply_filters( 'designr_content_width', 1170 );
}
