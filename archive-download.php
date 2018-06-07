<?php

/**
 * The template for displaying the EDD Store Archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildr
 */
get_header();

?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main">

        <?php if ( is_active_sidebar( 'sidebar-shop-above') ) : ?>

            <div class="sidebar-wrap shop above">

                <?php dynamic_sidebar('sidebar-shop-above'); ?>

            </div>

        <?php endif; ?>
        
        <div class="padded-content-wrap">
        
            <?php if ( have_posts() ) : ?>

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
        
        <?php if ( is_active_sidebar( 'sidebar-shop-below') ) : ?>

            <div class="sidebar-wrap shop below">

                <?php dynamic_sidebar('sidebar-shop-below'); ?>

            </div>

        <?php endif; ?>

    </main><!-- #main -->
    
</div><!-- #primary -->

<?php get_footer();
