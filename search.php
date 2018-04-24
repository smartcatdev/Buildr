<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Buildr
 */

get_header();
?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main">

        <div class="padded-content-wrap">
        
            <?php if ( have_posts() ) : ?>

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12">

                            <header class="page-header">
                                <h1 class="page-title">
                                    <?php printf( esc_html__( 'Search Results for: %s', 'buildr' ), '<span>' . get_search_query() . '</span>' ); ?>
                                </h1>
                            </header><!-- .page-header -->

                        </div>

                    </div>

                </div>

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

    </main><!-- #main -->
    
</div><!-- #primary -->

<?php get_footer();
