<?php
/**
 * The template for displaying the home pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Buildr
 */

get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <?php if ( is_active_sidebar( 'sidebar-front-above') ) : ?>

            <div class="sidebar-wrap front above">

                <?php dynamic_sidebar('sidebar-front-above'); ?>

            </div>

        <?php endif; ?>
        
        <div id="front-page-content" class="padded-content-wrap">
        
            <?php if ( have_posts() ) : ?>

                <?php if ( get_option( 'show_on_front' ) == 'posts' ) : ?>

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
                        while ( have_posts() ) : the_post();

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

                                <?php
                                while ( have_posts() ) : the_post();

                                    get_template_part('template-parts/content', 'page');

                                endwhile;
                                ?>

                           </div>

                        </div>

                    </div>

                <?php endif; ?>

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
            
        <?php if ( is_active_sidebar( 'sidebar-front-below') ) : ?>

            <div class="sidebar-wrap front below">

                <?php dynamic_sidebar('sidebar-front-below'); ?>

            </div>

        <?php endif; ?>
        
    </main>
    
</div>

<?php get_footer();
