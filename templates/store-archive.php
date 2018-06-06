<?php
/**
 * The EDD Store Archive page
 * 
 * Template name: EDD - Store page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildr
 */

//if ( is_tax( 'download_category' ) || is_tax( 'download_tag' ) ) :
//    $the_query = $wp_query;
//else :
//    $args = array (
//        'post_type'         => 'download',
//        'post_status'       => 'publish',
//        'posts_per_page'    => get_option( 'posts_per_page' ),
//        'paged'             => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1
//    );
//    $the_query = new WP_Query( $args );
//endif;

get_header(); ?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main buildr-edd-store">

        <div class="padded-content-wrap">

            <?php if ( have_posts() ) : ?>

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12">

                            <header class="page-header"></header><!-- .page-header -->

                        </div>

                    </div>

                </div>

                <?php 
                switch ( get_theme_mod( BUILDR_OPTIONS::EDD_LAYOUT_STYLE, BUILDR_DEFAULTS::EDD_LAYOUT_STYLE ) ) :

                    case 'edd_masonry' :
                        do_action( 'buildr_edd_masonry_wrap_open');
                        break;

                    default :
                        do_action( 'buildr_edd_masonry_wrap_open');

                endswitch; 
                ?>

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_theme_mod( BUILDR_OPTIONS::EDD_LAYOUT_STYLE, BUILDR_DEFAULTS::EDD_LAYOUT_STYLE ) );

                    endwhile;
                    ?>

                <?php 
                switch ( get_theme_mod( BUILDR_OPTIONS::EDD_LAYOUT_STYLE, BUILDR_DEFAULTS::EDD_LAYOUT_STYLE ) ) :

                    case 'edd_masonry' :
                        do_action( 'buildr_edd_masonry_wrap_close');
                        break;

                    default :
                        do_action( 'buildr_edd_masonry_wrap_close');

                endswitch; 
                ?>

            <?php else : ?>

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12">

                            <?php get_template_part( 'template-parts/content', 'none' ); ?>

                        </div>
                        
                    </div>
                    
                </div>

            <?php endif; ?>

        </div>
        
    </main><!-- #main -->
    
</div><!-- #primary -->

<?php get_footer(); ?>
