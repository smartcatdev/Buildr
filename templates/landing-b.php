<?php
/**
 * Template Name: Landing Page B
 */

get_header(); ?>

    <div id="primary" class="content-area">
        
        <main id="main" class="site-main">

            <?php if ( is_active_sidebar( 'sidebar-page-landing-b') ) : ?>

                <div class="sidebar-wrap page above">
            
                    <?php dynamic_sidebar('sidebar-page-landing-b'); ?>
            
                </div>
                    
            <?php endif; ?>

        </main><!-- #main -->
            
    </div><!-- #primary -->

<?php
get_footer();
