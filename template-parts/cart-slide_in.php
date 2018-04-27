<div id="dark-cart-overlayer"></div>

<div id="cart-panel">
    
    <div id="cart-panel-trigger">
        <span class="fas <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::WOO_SLIDE_CART_TAB_ICON, BUILDR_DEFAULTS::WOO_SLIDE_CART_TAB_ICON ) ); ?>"></span>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
            <path fill="#ffffff" d="M10.707 10.5l5.646-5.646c0.195-0.195 0.195-0.512 0-0.707s-0.512-0.195-0.707 0l-5.646 5.646-5.646-5.646c-0.195-0.195-0.512-0.195-0.707 0s-0.195 0.512 0 0.707l5.646 5.646-5.646 5.646c-0.195 0.195-0.195 0.512 0 0.707 0.098 0.098 0.226 0.146 0.354 0.146s0.256-0.049 0.354-0.146l5.646-5.646 5.646 5.646c0.098 0.098 0.226 0.146 0.354 0.146s0.256-0.049 0.354-0.146c0.195-0.195 0.195-0.512 0-0.707l-5.646-5.646z"></path>
        </svg>
    </div>

    <div class="inner">

        <div id="go-to-cart" href="/cart">
            <?php esc_html_e( 'Cart', 'buildr' ); ?>
            <span id="cart-sidebar-quantity">
                <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'buildr' ); ?>">
                    <?php /* translators: count of the number of items or one item */ ?>
                    <?php echo esc_html( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'buildr' ), WC()->cart->get_cart_contents_count() ) ); ?> 
                    - 
                    <?php echo esc_html( WC()->cart->get_cart_subtotal() ); ?>
                </a> 
            </span>
        </div>

        <div class="widget_shopping_cart_content">
            <?php woocommerce_mini_cart();?>
        </div>

    </div>

</div>