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
        
        <main id="main" class="site-main buildr-single-edd-product">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'download' );

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->

        <div class="sidebar-wrap post below">

            <div id="edd-header-wrap-wrapper">

            <div id="edd-header-wrap-blurb">

                <?php if ( get_post_meta( get_the_ID(), BUILDR_META::EDD_CATEGORY, true ) ) : ?>

                    <span class="product-category">
                        <?php echo esc_html( get_post_meta( get_the_ID(), BUILDR_META::EDD_CATEGORY, true ) ); ?>
                    </span>

                <?php endif; ?>

                <?php the_title( '<h3 class="product_title entry-title">Buy ', ' today!</h3>' ); ?>

                <span class="small-divider dark"></span>

                <div class="edd-buttons">

                    <div class="product-buttons">

                        <?php echo edd_get_purchase_link( array(
                            'download_id'       => get_the_ID(),
                            'price'             => false,
                            'direct'            => false,
                            'class'             => 'primary',
                        ) ); ?>

                        <?php if ( get_post_meta( get_the_ID(), BUILDR_META::EDD_SECOND_BUTTON_LABEL, true ) && get_post_meta( get_the_ID(), BUILDR_META::EDD_SECOND_BUTTON_URL, true ) ) : ?>

                            <a class="button secondary" href="<?php echo esc_url( get_post_meta( get_the_ID(), BUILDR_META::EDD_SECOND_BUTTON_URL, true ) ); ?>" <?php echo get_post_meta( get_the_ID(), BUILDR_META::EDD_SECOND_BUTTON_TARGET, true ) != 'same' ? ' target="_BLANK" ' : ''; ?>>
                                <?php echo esc_html( get_post_meta( get_the_ID(), BUILDR_META::EDD_SECOND_BUTTON_LABEL, true ) ); ?>
                            </a>

                        <?php endif; ?>

                    </div>

                    <div class="clear"></div>

                </div>

        </div>
            </div>
            </div>


    </div><!-- #primary -->

<?php
get_footer();
