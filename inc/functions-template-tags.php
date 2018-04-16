<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Buildr
 */
if ( !function_exists( 'buildr_posted_on' ) ) :

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function buildr_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() )
        );

        $posted_on = sprintf(
                /* translators: %s: post date. */
                esc_html_x( 'Posted on %s', 'post date', 'buildr' ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
    }

endif;

if ( !function_exists( 'buildr_posted_by' ) ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function buildr_posted_by() {
        $byline = sprintf(
                /* translators: %s: post author. */
                esc_html_x( 'by %s', 'post author', 'buildr' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }

endif;

if ( !function_exists( 'buildr_entry_footer' ) ) :

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function buildr_entry_footer() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'buildr' ) );
            if ( $categories_list ) {
                /* translators: 1: list of categories. */
                printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'buildr' ) . '</span>', $categories_list ); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'buildr' ) );
            if ( $tags_list ) {
                /* translators: 1: list of tags. */
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'buildr' ) . '</span>', $tags_list ); // WPCS: XSS OK.
            }
        }

        if ( !is_single() && !post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link(
                    sprintf(
                            wp_kses(
                                    /* translators: %s: post title */
                                    __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'buildr' ), array (
                'span' => array (
                    'class' => array (),
                ),
                                    )
                            ), get_the_title()
                    )
            );
            echo '</span>';
        }

        edit_post_link(
                sprintf(
                        wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Edit <span class="screen-reader-text">%s</span>', 'buildr' ), array (
            'span' => array (
                'class' => array (),
            ),
                                )
                        ), get_the_title()
                ), '<span class="edit-link">', '</span>'
        );
    }

endif;

if ( !function_exists( 'buildr_post_thumbnail' ) ) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function buildr_post_thumbnail() {
        if ( post_password_required() || is_attachment() || !has_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) :
            ?>

            <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
            <?php
            the_post_thumbnail( 'post-thumbnail', array (
                'alt' => the_title_attribute( array (
                    'echo' => false,
                ) ),
            ) );
            ?>
            </a>

            <?php
            endif; // End is_singular().
        }


endif;

/**
 * Render the SC designer section.
 * 
 * @since 1.0.0
 * @return void
 */
add_action( 'buildr_designer', 'buildr_render_designer', 10 );
function buildr_render_designer() { ?>
          
    <span class="buildr_by">
        <?php esc_html_e( 'Design by', 'buildr' ); ?>
    </span>
    <a href="https://smartcatdesign.net/" rel="designer" class="rel">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/smartcat_logo_white.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
    </a>
    
<?php }

/**
 * Render the HTML that opens the wrap of the Masonry Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_masonry_wrap_open() { ?>
    
    <div class="masonry-card-blog">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <div class="masonry_card_blog">

                        <div class="grid_sizer"></div>
                        <div class="grid_spaced"></div>

<?php }
add_action( 'blog_masonry_wrap_open', 'buildr_render_masonry_wrap_open');               
    
/**
 * Render the HTML that closes the wrap of the Masonry Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_masonry_wrap_close() { ?>
                        
                    </div>
                    
                    <div class="buildr-pagination-links">
                        <?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                    </div>

                </div>

            </div>

        </div>

    </div>

<?php }
add_action( 'blog_masonry_wrap_close', 'buildr_render_masonry_wrap_close');        

/**
 * Render the HTML that opens the wrap of the Mosaic Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_mosaic_wrap_open() { ?>
    
    <div class="mosaic-grid-blog">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">
                    
                    <div class="mosaic-grid">

<?php }
add_action( 'blog_mosaic_wrap_open', 'buildr_render_mosaic_wrap_open'); 

/**
 * Render the HTML that closes the wrap of the Mosaic Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_mosaic_wrap_close() { ?>
                        
                    </div>
                        
                    <div class="buildr-pagination-links">
                        <?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                    </div>

                </div>

            </div>

        </div>

    </div>

<?php }
add_action( 'blog_mosaic_wrap_close', 'buildr_render_mosaic_wrap_close');        

/**
 * Render the HTML that opens the wrap of the Standard Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_standard_wrap_open() { ?>
    
    <div class="standard-stacked-blog">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">
                    
                    <div class="standard-blog">

<?php }
add_action( 'blog_standard_wrap_open', 'buildr_render_standard_wrap_open'); 

/**
 * Render the HTML that closes the wrap of the Standard Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_standard_wrap_close() { ?>
                        
                    </div>
                        
                    <div class="buildr-pagination-links">
                        <?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                    </div>

                </div>

            </div>

        </div>

    </div>

<?php }
add_action( 'blog_standard_wrap_close', 'buildr_render_standard_wrap_close');        
