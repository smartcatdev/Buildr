<?php
/**
 * The template for displaying authors
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildr
 */

global $authordata;
if( ! $authordata ) :
    wp_safe_redirect( '/' );
endif;

get_header(); ?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main">

        <div id="author-banner" class="<?php echo get_user_meta( $authordata->ID, 'author_banner', true ) ? 'has-banner' : ''; ?>" style="background-image: url(<?php echo esc_url( get_user_meta( $authordata->ID, 'author_banner', true ) ); ?>);">
        </div>
        
        <div id="author-meta-wrap" class="container">

            <div class="row">

                <div class="col-sm-12">

                    <header class="author-meta-header">

                        <?php echo get_avatar( $authordata->ID, 150 ); ?>
                        
                    </header><!-- .page-header -->
                    
                    <h1 class="author-nicename">
                        <?php echo esc_html( get_user_meta( $authordata->ID, 'nickname', true ) ); ?>
                    </h1>
                    
                    <div class="author-job-location-social">
                    
                        <?php if ( get_user_meta( $authordata->ID, 'job_title', true ) ) : ?>
                            <span class="author-job">
                                <?php echo esc_html( get_user_meta( $authordata->ID, 'job_title', true ) ); ?>
                            </span>
                        <?php endif; ?>

                        <?php echo get_user_meta( $authordata->ID, 'job_title', true ) && get_user_meta( $authordata->ID, 'location', true ) ? '|' : ''; ?>

                        <?php if ( get_user_meta( $authordata->ID, 'location', true ) ) : ?>
                            <span class="author-location">
                                <?php echo esc_html( get_user_meta( $authordata->ID, 'location', true ) ); ?>
                            </span>
                        <?php endif; ?>
                        
                        <div class="author-social">
                            
                            <?php if ( get_user_meta( $authordata->ID, 'facebook', true ) ) : ?>
                                <a class="social-link" href="<?php echo esc_url( get_user_meta( $authordata->ID, 'facebook', true ) ); ?>">
                                    <span class="fab fa-facebook-f"></span>
                                </a>
                            <?php endif; ?>
                            <?php if ( get_user_meta( $authordata->ID, 'twitter', true ) ) : ?>
                                <a class="social-link" href="<?php echo esc_url( get_user_meta( $authordata->ID, 'twitter', true ) ); ?>">
                                    <span class="fab fa-twitter"></span>
                                </a>
                            <?php endif; ?>
                            <?php if ( get_user_meta( $authordata->ID, 'linkedin', true ) ) : ?>
                                <a class="social-link" href="<?php echo esc_url( get_user_meta( $authordata->ID, 'linkedin', true ) ); ?>">
                                    <span class="fab fa-linkedin-in"></span>
                                </a>
                            <?php endif; ?>
                            <?php if ( get_user_meta( $authordata->ID, 'pinterest', true ) ) : ?>
                                <a class="social-link" href="<?php echo esc_url( get_user_meta( $authordata->ID, 'pinterest', true ) ); ?>">
                                    <span class="fab fa-pinterest-p"></span>
                                </a>
                            <?php endif; ?>
                            <?php if ( get_user_meta( $authordata->ID, 'instagram', true ) ) : ?>
                                <a class="social-link" href="<?php echo esc_url( get_user_meta( $authordata->ID, 'instagram', true ) ); ?>">
                                    <span class="fab fa-instagram"></span>
                                </a>
                            <?php endif; ?>
                            
                        </div>
                        
                    </div>
                    
                    <hr>
                    
                    <?php if ( get_user_meta( $authordata->ID, 'description', true ) ) : ?>
                        <div class="author-bio">
                            <?php echo esc_html( get_user_meta( $authordata->ID, 'description', true ) ); ?>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

        </div>

        <div class="padded-content-wrap">
        
            <?php if ( have_posts() ) : ?>

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
