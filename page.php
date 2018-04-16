<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildr
 */

get_header(); ?>

    <div id="primary" class="content-area">
        
        <main id="main" class="site-main">

            <?php if ( is_active_sidebar( 'sidebar-page-above') ) : ?>

                <div class="sidebar-wrap page above">
            
                    <?php dynamic_sidebar('sidebar-page-above'); ?>
            
                </div>
                    
            <?php endif; ?>
            
            <div class="container">
            
                <div class="row">
                
                    <div class="col-sm-12">
            
                        <?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'page' );

                        endwhile; // End of the loop.
                        ?>
            
                    </div>
                    
                </div>
                
            </div>
            
            <?php if ( is_active_sidebar( 'sidebar-page-below') ) : ?>

                <div class="sidebar-wrap page below">
            
                    <?php dynamic_sidebar('sidebar-page-below'); ?>
            
                </div>
                
            <?php endif; ?>

        </main><!-- #main -->
            
    </div><!-- #primary -->

<?php
get_footer();
