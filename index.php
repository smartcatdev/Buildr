<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildr
 */
get_header(); ?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main">
        
        <?php if ( is_active_sidebar( 'sidebar-blog-above') ) : ?>

            <div class="sidebar-wrap blog above">

                <?php dynamic_sidebar('sidebar-blog-above'); ?>

            </div>

        <?php endif; ?>

        <div class="padded-content-wrap">
        
            <?php if ( have_posts() ) : ?>

                <?php if ( is_home() && !is_front_page() ) : ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                <?php endif; ?>

                <?php 
                switch ( get_theme_mod( BUILDR_OPTIONS::BLOG_LAYOUT_STYLE, BUILDR_DEFAULTS::BLOG_LAYOUT_STYLE ) ) :

                    case 'blog_masonry' :
                        do_action( 'buildr_blog_masonry_wrap_open');
                        break;

                    case 'blog_mosaic' :
                        do_action( 'buildr_blog_mosaic_wrap_open');
                        break;

                    default :
                        do_action( 'buildr_blog_standard_wrap_open');

                endswitch; 
                ?>

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', get_theme_mod( BUILDR_OPTIONS::BLOG_LAYOUT_STYLE, BUILDR_DEFAULTS::BLOG_LAYOUT_STYLE ) );

                    endwhile;
                    ?>

                <?php 
                switch ( get_theme_mod( BUILDR_OPTIONS::BLOG_LAYOUT_STYLE, BUILDR_DEFAULTS::BLOG_LAYOUT_STYLE ) ) :

                    case 'blog_masonry' :
                        do_action( 'buildr_blog_masonry_wrap_close');
                        break;

                    case 'blog_mosaic' :
                        do_action( 'buildr_blog_mosaic_wrap_close');
                        break;

                    default :
                        do_action( 'buildr_blog_standard_wrap_close');

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
        
        <?php if ( is_active_sidebar( 'sidebar-blog-below') ) : ?>

            <div class="sidebar-wrap blog below">

                <?php dynamic_sidebar('sidebar-blog-below'); ?>

            </div>

        <?php endif; ?>
            
    </main><!-- #main -->
    
</div><!-- #primary -->

<?php get_footer();
