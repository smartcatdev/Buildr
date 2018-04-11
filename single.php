<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Designr
 */
get_header(); ?>

    <div id="primary" class="content-area">
        
        <main id="main" class="site-main">

            <?php if ( is_active_sidebar( 'sidebar-post-above') ) : ?>

                <div class="sidebar-wrap post above">
            
                    <?php dynamic_sidebar('sidebar-post-above'); ?>
            
                </div>
                    
            <?php endif; ?>
            
            <div class="container">
            
                <div class="row">
                
                    <div class="col-sm-10 col-md-10 col-lg-9">
            
                        <?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', get_post_type() );

                        endwhile; // End of the loop.
                        ?>
            
                    </div>
                    
                </div>
                
            </div>

            <?php if ( is_active_sidebar( 'sidebar-post-below') ) : ?>

                <div class="sidebar-wrap post below">
            
                    <?php dynamic_sidebar('sidebar-post-below'); ?>
            
                </div>
                
            <?php endif; ?>
            
        </main><!-- #main -->
        
    </div><!-- #primary -->

<?php
get_footer();
