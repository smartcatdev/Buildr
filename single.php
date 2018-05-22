<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Buildr
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
                
                    <?php buildr_output_side_sidebar( 'single', 'left' ) ?>
                    
                    <div class="<?php echo buildr_is_single_sidebar_active( 'post' ) ? 'has-side-sidebar ' . esc_attr( get_post_meta( get_the_ID(), BUILDR_META::SIDEBAR_LOCATION, true ) ) . ' col-sm-9 col-md-9 col-lg-9' : 'col-sm-10 col-md-10 col-lg-9'; ?>">
            
                        <?php
                        while ( have_posts() ) : the_post();
                            
                            get_template_part( 'template-parts/content', get_post_type() );

                        endwhile; // End of the loop.
                        ?>
            
                    </div>
                    
                    <?php buildr_output_side_sidebar( 'single', 'right' ) ?>
                    
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
