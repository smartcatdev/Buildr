<?php
/**
 * Template Name: Widget Shell
 */

get_header(); ?>

    <div id="primary" class="content-area widget-shell">
        
        <main id="main" class="site-main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
            
    </div><!-- #primary -->

<?php
get_footer();
