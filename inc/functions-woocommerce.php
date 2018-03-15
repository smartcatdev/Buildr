<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Designr
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function designr_woocommerce_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'designr_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function designr_woocommerce_scripts() {
    
    wp_enqueue_style( 'designr-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

    $font_path = WC()->plugin_url() . '/assets/fonts/';
    $inline_font = '@font-face {
        font-family: "star";
        src: url("' . $font_path . 'star.eot");
        src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
            url("' . $font_path . 'star.woff") format("woff"),
            url("' . $font_path . 'star.ttf") format("truetype"),
            url("' . $font_path . 'star.svg#star") format("svg");
        font-weight: normal;
        font-style: normal;
    }';

    wp_add_inline_style( 'designr-woocommerce-style', $inline_font );
    
}
add_action( 'wp_enqueue_scripts', 'designr_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'woocommerce_enqueue_styles', 'designr_woocommerce_dequeue_styles' );
function designr_woocommerce_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    //  unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    //  unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    return $enqueue_styles;
}

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function designr_woocommerce_active_body_class( $classes ) {
    
    $classes[] = 'woocommerce-active';
    return $classes;
    
}
add_filter( 'body_class', 'designr_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function designr_woocommerce_related_products_args( $args ) {
    $defaults = array (
        'posts_per_page'    => 3,
        'columns'           => 3,
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'designr_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( !function_exists( 'designr_woocommerce_wrapper_before' ) ) {

    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function designr_woocommerce_wrapper_before() { ?>
        
        <div id="primary" class="content-area">
            
            <main id="main" class="site-main" role="main">
            
                <div id="designr-woocommerce-wrap" class="shop-archive">
                
                    <div class="container">
                    
                        <div class="row">
                    
                            <div class="col-md-12">
                
        <?php
            
    }

}
add_action( 'woocommerce_before_main_content', 'designr_woocommerce_wrapper_before', 5 );

if ( !function_exists( 'designr_woocommerce_wrapper_after' ) ) {

    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function designr_woocommerce_wrapper_after() { ?>
        
                        
                            </div><!-- .col-md-12 -->
                    
                        </div><!-- .row -->
                
                    </div><!-- .container -->
                    
                </div><!-- #designr-woocommerce-wrap -->
                                
            </main><!-- #main -->
            
        </div><!-- #primary -->
        
        <?php
        
    }

}
add_action( 'woocommerce_after_main_content', 'designr_woocommerce_wrapper_after', 50 );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
  <?php
  if ( function_exists( 'designr_woocommerce_header_cart' ) ) {
  designr_woocommerce_header_cart();
  }
  ?>
 */
if ( !function_exists( 'designr_woocommerce_cart_link_fragment' ) ) {

    /**
     * Cart Fragments.
     *
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param array $fragments Fragments to refresh via AJAX.
     * @return array Fragments to refresh via AJAX.
     */
    function designr_woocommerce_cart_link_fragment( $fragments ) {
        ob_start();
        designr_woocommerce_cart_link();
        $fragments[ 'a.cart-contents' ] = ob_get_clean();

        return $fragments;
    }

}
add_filter( 'woocommerce_add_to_cart_fragments', 'designr_woocommerce_cart_link_fragment' );

if ( !function_exists( 'designr_woocommerce_cart_link' ) ) {

    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function designr_woocommerce_cart_link() {
        ?>
        <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'designr' ); ?>">
            <?php /* translators: number of items in the mini cart. */ ?>
            <span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'designr' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
        </a>
        <?php
    }

}

if ( !function_exists( 'designr_woocommerce_header_cart' ) ) {

    /**
     * Display Header Cart.
     *
     * @return void
     */
    function designr_woocommerce_header_cart() {
        if ( is_cart() ) {
            $class = 'current-menu-item';
        } else {
            $class = '';
        }
        ?>
        <ul id="site-header-cart" class="site-header-cart">
            <li class="<?php echo esc_attr( $class ); ?>">
                <?php designr_woocommerce_cart_link(); ?>
            </li>
            <li>
                <?php
                $instance = array (
                    'title' => '',
                );

                the_widget( 'WC_Widget_Cart', $instance );
                ?>
            </li>
        </ul>
        <?php
    }

}

/**
 * Remove default WooCommerce wrapper.
 */

if ( !function_exists( 'designr_woocommerce_product_details_wrapper_before' ) ) {

    /**
     * Before the Title in WooCommerce Product content.
     *
     * @return void
     */
    function designr_woocommerce_product_details_wrapper_before() { ?>
        
        <div class="details-wrap">

        <?php
            
    }

}
add_action( 'woocommerce_before_shop_loop_item_title', 'designr_woocommerce_product_details_wrapper_before', 50 );
add_action( 'woocommerce_before_subcategory_title', 'designr_woocommerce_product_details_wrapper_before', 50 );

if ( !function_exists( 'designr_woocommerce_product_details_wrapper_after' ) ) {

    /**
     * After the Title in WooCommerce Product content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function designr_woocommerce_product_details_wrapper_after() { ?>
                        
            <div class="clear"></div>
            
        </div><!-- .product-details -->

        <?php
        
    }

}
add_action( 'woocommerce_after_shop_loop_item', 'designr_woocommerce_product_details_wrapper_after', 50 );
add_action( 'woocommerce_after_subcategory', 'designr_woocommerce_product_details_wrapper_after', 50 );

if ( get_theme_mod( 'designr_woocommerce_loop_show_categories', true ) ) {

    if ( !function_exists( 'designr_woocommerce_product_loop_category' ) ) {

        /**
         * Output the category for the product if toggled on.
         */
        function designr_woocommerce_product_loop_category() {

            $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

            if ( $product_cats && ! is_wp_error ( $product_cats ) ) {

                $single_cat = array_shift( $product_cats ); ?>

                <h4 class="product_category_title">
                    <?php echo esc_html( $single_cat->name ); ?>
                </h4>

            <?php 

            }

        }
        
    }
    
}
add_action( 'woocommerce_shop_loop_item_title', 'designr_woocommerce_product_loop_category', 5 );

if ( get_theme_mod( 'designr_woocommerce_loop_show_excerpts', true ) ) {

    if ( !function_exists( 'designr_woocommerce_product_loop_excerpt' ) ) {

        /**
         * Output the excerpt/content for the product if toggled on.
         */
        function designr_woocommerce_product_loop_excerpt() { ?>

            <div class="product_category_excerpt">
                <?php the_excerpt(); ?>
            </div>

        <?php 

        }

    }
    add_action( 'woocommerce_shop_loop_item_title', 'designr_woocommerce_product_loop_excerpt', 20 );
    
}

if ( !function_exists( 'designr_woocommerce_product_loop_cta' ) ) {

    /**
     * Output the excerpt/content for the product if toggled on.
     */
    function designr_woocommerce_product_loop_cta( $ctr = 0 ) { ?>

        <?php if ( $ctr == get_option( 'woocommerce_catalog_columns', 4 ) ) : ?>

            </ul>

            <div class="woocommerce-cta" style="background-image: url(<?php echo esc_url( get_theme_mod( 'designr_woocommerce_loop_cta_bg_image', get_template_directory_uri() . '/assets/images/sougwen.jpg' ) ); ?>);">

                <div class="woocommerce-cta-inner dark-unsat-gradient">

                    <span class="pre-title wow fadeInLeftBig">
                        About Us
                    </span>

                    <h2 class="hero-title wow fadeInLeft">
                        We live where style meets substance.
                    </h2>

                    <p class="wow fadeInLeft">
                        Every space has its own purpose. Our task is to understand, see and implement it. We speak the architectural language fluently.
                    </p>

                    <a class="button hollow wow fadeInUpBig" href="#">
                        Discover
                    </a>

                </div>

            </div>

            <ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">

        <?php endif; ?>

    <?php 

    }

}
