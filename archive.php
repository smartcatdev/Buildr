<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Designr
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
                                <?php
                                the_archive_title( '<h1 class="page-title">', '</h1>' );
                                the_archive_description( '<div class="archive-description">', '</div>' );
                                ?>
                            </header><!-- .page-header -->

                        </div>

                    </div>

                </div>

                <?php 
                switch ( get_theme_mod( DESIGNR_OPTIONS::BLOG_LAYOUT_STYLE, DESIGNR_DEFAULTS::BLOG_LAYOUT_STYLE ) ) :

                    case 'blog_masonry' :
                        do_action( 'blog_masonry_wrap_open');
                        break;

                    case 'blog_mosaic' :
                        do_action( 'blog_mosaic_wrap_open');
                        break;

                    default :
                        do_action( 'blog_standard_wrap_open');

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
                        get_template_part( 'template-parts/content', get_theme_mod( DESIGNR_OPTIONS::BLOG_LAYOUT_STYLE, DESIGNR_DEFAULTS::BLOG_LAYOUT_STYLE ) );

                    endwhile;
                    ?>

                <?php 
                switch ( get_theme_mod( DESIGNR_OPTIONS::BLOG_LAYOUT_STYLE, DESIGNR_DEFAULTS::BLOG_LAYOUT_STYLE ) ) :

                    case 'blog_masonry' :
                        do_action( 'blog_masonry_wrap_close');
                        break;

                    case 'blog_mosaic' :
                        do_action( 'blog_mosaic_wrap_close');
                        break;

                    default :
                        do_action( 'blog_standard_wrap_close');

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
