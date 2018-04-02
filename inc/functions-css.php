<?php

/**
 * Enqueue scripts and styles.
 */
function designr_wp_head_styles() { ?>

    <style type="text/css">

        /* ---------------------------------------------------------------------
         * Typography
         * ------------------------------------------------------------------ */

        body,
        .site-branding .site-title,
        div#footer-branding-wrap .site-title,
        div#custom-header-content .custom-header-title,
        div#designr-custom-header.parallax_layers .custom-header-title,
        h2.widget-title,
        ul.product_list_widget .product-wrap .product-title .price-wrap {
            font-family: <?php esc_attr_e( get_theme_mod( 'secondary_font', 'Abel, sans-serif' ) ); ?>;
        }

        h1,h2,h3,h4,h5,h6,
        ul#mobile-menu li a,
        ul.slim-header-menu > li a,
        ul#custom-header-menu > li a,
        .blog_item_wrap .blog_item .inner .blog-meta,
        .standard-stacked-blog .blog_item_wrap .blog_item .blog-meta .posted-meta,
        ul.product_list_widget .product-wrap .product-title,
        .woocommerce-tabs.wc-tabs-wrapper ul.tabs li,
        .woocommerce table.variations .label,
        table.shop_attributes th {
            font-family: <?php esc_attr_e( get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ); ?>;
        }

        h1,h2,h3,h4,h5,h6 {
            letter-spacing: <?php esc_attr_e( get_theme_mod( 'headings_letter_spacing', '0.0' ) ); ?>em;
            line-height: <?php esc_attr_e( get_theme_mod( 'headings_line_height', '1' ) ); ?>em;
        }

        body {
            font-size: <?php esc_attr_e( get_theme_mod( 'body_font_size', 16 ) ) ?>px;
        }
        
        <?php if ( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_LINKS_FONT_FAMILY, DESIGNR_DEFAULTS::NAVBAR_LINKS_FONT_FAMILY ) == 'secondary' ) : ?>

            ul#mobile-menu li a,
            ul.slim-header-menu > li a {
                font-family: <?php esc_attr_e( get_theme_mod( 'secondary_font', 'Abel, sans-serif' ) ); ?>;
            }

        <?php endif; ?>

        <?php if ( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_MENU_FONT_FAMILY, DESIGNR_DEFAULTS::CUSTOM_HEADER_MENU_FONT_FAMILY ) == 'secondary' ) : ?>

            ul#custom-header-menu > li a {
                font-family: <?php esc_attr_e( get_theme_mod( 'secondary_font', 'Abel, sans-serif' ) ); ?>;
            }

        <?php endif; ?>

        <?php if ( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_TITLE_FONT_FAMILY, DESIGNR_DEFAULTS::CUSTOM_HEADER_TITLE_FONT_FAMILY ) == 'primary' ) : ?>

            div#custom-header-content .custom-header-title,
            div#designr-custom-header.parallax_layers .custom-header-title {
                font-family: <?php esc_attr_e( get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ); ?>;
            }

        <?php endif; ?>
        
        <?php if ( get_theme_mod( 'prefooter_widget_title_font_family', 'secondary' ) == 'primary' ) : ?>

            h2.widget-title {
                font-family: <?php esc_attr_e( get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ); ?>;
            }

        <?php endif; ?>
        
        header#masthead .site-title {
           text-transform: <?php echo get_theme_mod( DESIGNR_OPTIONS::NAVBAR_SITE_TITLE_ALL_CAPS, DESIGNR_DEFAULTS::NAVBAR_SITE_TITLE_ALL_CAPS ) ? 'uppercase' : 'none'; ?>;
        }
        div#custom-header-content .custom-header-title, 
        div#designr-custom-header.parallax_layers .custom-header-title {
           text-transform: <?php echo get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_TITLE_ALL_CAPS, DESIGNR_DEFAULTS::CUSTOM_HEADER_TITLE_ALL_CAPS ) ? 'uppercase' : 'none'; ?>;
        }
        footer div#footer-branding-wrap .site-title {
           text-transform: <?php echo get_theme_mod( 'footer_site_title_uppercase', true ) ? 'uppercase' : 'none'; ?>;
        }
        h2.widget-title {
            text-transform: <?php echo get_theme_mod( 'prefooter_widget_title_uppercase', true ) ? 'uppercase' : 'none'; ?>;
        }
        
        /* ---------------------------------------------------------------------
         * Colors
         * ------------------------------------------------------------------ */

        <?php $theme_colors = designr_get_all_theme_colors(); ?>

        /* ----- Primary Color ---------------------------------------------- */

        ul.slim-header-menu > li.current-menu-item > a:before,
        ul.slim-header-menu > li:not(.menu-item-has-children) > a:before,
        div#slim-header ul#mobile-menu:before,
        div#banner-header ul#mobile-menu:before,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu:before,
        div#designr-woocommerce-wrap span.onsale,
        button, 
        input[type="submit"],
        a.button,
        .widget_price_filter .ui-slider .ui-slider-range,
        .widget_price_filter .ui-slider .ui-slider-handle,
        h3.shop-sub-heading,
        form.woocommerce-ordering > select,
        .woocommerce select {
            background-color: <?php esc_attr_e( $theme_colors['primary'] ); ?>;
        }

        a,
        div#slim-header a:hover,
        div#banner-header a:hover,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu li a:hover,
        .woocommerce p.stars:hover a:before {
            color: <?php esc_attr_e( $theme_colors['primary'] ); ?>;
        }

        footer #designr_designer path {
            fill: <?php esc_attr_e($theme_colors['primary']); ?>;
        }
        
        button, 
        input[type="submit"],
        a.button {
            border-color: <?php esc_attr_e( $theme_colors['primary'] ); ?>;
        }
        
        /* ----- Secondary Color -------------------------------------------- */

        a:not(.button):hover {
            color: <?php esc_attr_e( $theme_colors['secondary'] ); ?>;
        }

        /* ----- Navbar Colors & Image -------------------------------------- */

        <?php if ( get_theme_mod( 'navbar_background_style', 'color' ) == 'color' ) : ?>

            div#slim-header-wrap,
            div#banner-header-wrap {
                background-color: <?php esc_attr_e( $theme_colors['navbar_bg'] ); ?>;
            }

        <?php else : ?>

            div#slim-header-wrap,
            div#banner-header-wrap {
                background-image: url(<?php echo esc_url( get_theme_mod( 'navbar_bg_image', '' ) ); ?>);
            }

            div#slim-header ul#mobile-menu {
                background-color: <?php esc_attr_e( $theme_colors['navbar_bg'] ); ?>;
            }

        <?php endif; ?>

        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu {
            background-color: <?php esc_attr_e( $theme_colors['navbar_bg'] ); ?>;
        }

        div#slim-header,
        div#slim-header a,
        div#banner-header,
        div#banner-header a,
        ul.slim-header-menu > li.current-menu-item > a,
        header#masthead.header-style-split .navbar-social #split-social-trigger {
            color: <?php esc_attr_e( $theme_colors['navbar_fg'] ); ?>;
        }

        a#split-social-trigger path {
            fill: <?php esc_attr_e( $theme_colors['navbar_fg'] ); ?>;
        }

        <?php if ( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_STYLE, DESIGNR_DEFAULTS::NAVBAR_STYLE ) == 'banner' && ! get_theme_mod( 'navbar_banner_transparent_menu_toggle', true ) ) : ?>
        
            header#masthead.header-style-banner #banner-header-wrap #banner-header-menu-wrap,
            ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu {
                background-color: <?php esc_attr_e( $theme_colors['navbar_menu_bg'] ); ?>;
            }
            
            div#banner-header ul.slim-header-menu a {
                color: <?php esc_attr_e( $theme_colors['navbar_menu_fg'] ); ?>;
            }
        
        <?php endif; ?>
        
        header#masthead.header-style-split .navbar-social {
            background-color: <?php esc_attr_e( $theme_colors['social_bg'] ); ?>;
        }

        header#masthead.header-style-slim .navbar-social a.navbar-icon,
        header#masthead.header-style-split .navbar-social a.navbar-icon {
            color: <?php esc_attr_e( $theme_colors['social_fg'] ); ?>;
        }

        header#masthead.header-style-slim .navbar-social a.navbar-icon:hover,
        header#masthead.header-style-split .navbar-social a.navbar-icon:hover {
            color: <?php esc_attr_e( $theme_colors['social_fg_hov'] ); ?>;
        }

        /* ----- Custom Header Colors --------------------------------------- */

        div#custom-header-content .custom-header-title,
        div#designr-custom-header.parallax_layers .custom-header-title {
            color: <?php esc_attr_e( $theme_colors['custom_header_title'] ); ?>;
        }

        ul#custom-header-menu > li a {
            color: <?php esc_attr_e( $theme_colors['custom_header_menu'] ); ?>;
        }

        /* ----- Footer Colors ---------------------------------------------- */

        div#pre-footer-wrap {
            border-top: <?php esc_attr_e( get_theme_mod( 'prefooter_top_border_thickness', 10 ) ) ?>px solid <?php esc_attr_e($theme_colors['primary']); ?>;
            background-color: <?php esc_attr_e( $theme_colors['prefooter_bg'] ); ?>;
            color: <?php esc_attr_e( $theme_colors['prefooter_fg'] ); ?>;
        }
        
        aside.widget table#wp-calendar th, 
        aside.widget table#wp-calendar td {
            color: <?php esc_attr_e( $theme_colors['prefooter_fg'] ); ?>;
        }
        
        h2.widget-title {
            color: <?php esc_attr_e( $theme_colors['footer_widget_title'] ); ?>;
        }
        
        footer div#slim-footer-wrap {
            background-color: #<?php esc_attr_e( $theme_colors['footer_bg'] ); ?>;
        }

        div#slim-footer,
        div#slim-footer a {
            color: <?php esc_attr_e( $theme_colors['footer_fg'] ); ?>;
        }
        
        /* ----- Slide-in Cart Tab ------------------------------------------ */
        
        div#cart-panel-trigger {
            background-color: <?php esc_attr_e( $theme_colors['cart_tab'] ); ?>;
        }
        
        /* ---------------------------------------------------------------------
         * Navbar
         * ------------------------------------------------------------------ */

        <?php if ( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_STYLE, DESIGNR_DEFAULTS::NAVBAR_STYLE ) == 'slim_split' || get_theme_mod( DESIGNR_OPTIONS::NAVBAR_STYLE, DESIGNR_DEFAULTS::NAVBAR_STYLE ) == 'slim_left' ) : ?>
            @media (min-width: 992px) {
                div#content {
                    padding-top: <?php // esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) + 2 ) ?>px;
                    padding-top: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) - 1 ) ?>px;
                }
                div#content.sticky-header {
                    padding-top: <?php // esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) + 2 ) ?>px;
                    padding-top: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) - 1 ) ?>px;
                }
            }
        <?php endif; ?>

        <?php if ( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_HAS_SHADOW, DESIGNR_DEFAULTS::NAVBAR_HAS_SHADOW ) ) : ?>
            div#slim-header-wrap,
            div#banner-header-wrap {
                box-shadow: 0px 0px 10px 0px rgba(0,0,0,.75);
            }
        <?php endif; ?>

        /* ----- Slim Navbars: Logo Settings -------------------------------- */

        <?php if ( get_theme_mod( 'style_a_always_show_logo', false ) ) : ?>
            header img.custom-logo {
                height: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) ) ?>px;
                margin: 0 <?php esc_attr_e( get_theme_mod( 'style_a_logo_space', 15 ) ) ?>px;
                opacity: 1;
            }
        <?php else : ?>
            header img.custom-logo {
                height: 0px;
                opacity: 0;
            }
        <?php endif; ?>

        .is-sticky img.custom-logo {
            height: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) ) ?>px;
            margin: 0 <?php esc_attr_e( get_theme_mod( 'style_a_logo_space', 15 ) ) ?>px;
        }

        /* ----- Slim Navbars: Collapse ------------------------------------- */

        #slim-header-wrap ul.slim-header-menu > li > a,
        #slim-header-wrap ul.slim-header-menu > li {
            line-height: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) ) ?>px;
        }

        /* ----- Slim Navbars: Expand --------------------------------------- */

        .is-sticky #slim-header-wrap ul.slim-header-menu > li > a,
        .is-sticky #slim-header-wrap ul.slim-header-menu > li {
            line-height: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) ) ?>px;
        }

        /* ----- Slim Navbars: Site Title ----------------------------------- */

        .site-branding .site-title {
            font-size: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_SITE_TITLE_FONT_SIZE, DESIGNR_DEFAULTS::NAVBAR_SITE_TITLE_FONT_SIZE ) ) ?>px;
            letter-spacing: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_SITE_TITLE_LETTER_GAP, DESIGNR_DEFAULTS::NAVBAR_SITE_TITLE_LETTER_GAP ) ); ?>em;
        }

        <?php if ( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_SITE_TITLE_FONT_FAMILY, DESIGNR_DEFAULTS::NAVBAR_SITE_TITLE_FONT_FAMILY ) == 'primary' ) : ?>

            .site-branding .site-title,
            div#footer-branding-wrap .site-title {
                font-family: <?php esc_attr_e( get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ); ?>;
            }

        <?php endif; ?>

        /* ----- Slim Navbars: Site Description ----------------------------- */

        .site-branding .site-tagline {
            font-size: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_TAGLINE_FONT_SIZE, DESIGNR_DEFAULTS::NAVBAR_TAGLINE_FONT_SIZE ) ) ?>px;
        }

        <?php if ( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_TAGLINE_FONT_FAMILY, DESIGNR_DEFAULTS::NAVBAR_TAGLINE_FONT_FAMILY ) == 'primary' ) : ?>

            .site-branding .site-tagline {
                font-family: <?php esc_attr_e( get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ); ?>;
            }

        <?php endif; ?>

        <?php if ( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_HIDE_TAGLINE, DESIGNR_DEFAULTS::NAVBAR_HIDE_TAGLINE ) ) : ?>

            .site-branding .site-tagline {
                display: none !important;
            }

        <?php endif; ?>

        /* ----- Slim Navbars: Nav Links ------------------------------------ */

        ul.slim-header-menu > li {
            padding: 0 <?php esc_attr_e( intval( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_LINKS_GAP, DESIGNR_DEFAULTS::NAVBAR_LINKS_GAP ) / 2 ) ) ?>px;
        }

        ul#mobile-menu li a,
        ul.slim-header-menu > li a {
            font-size: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_LINKS_FONT_SIZE, DESIGNR_DEFAULTS::NAVBAR_LINKS_FONT_SIZE ) ) ?>px;
        }

        /* ----- Slim Navbars: Left Aligned Logo & Right Aligned Menu ------- */

        <?php if ( get_theme_mod( 'style_a_right_align_menu', false ) ) : ?>
        
            header#masthead.header-style-slim div#slim-header .right-half {
                justify-content: flex-end;
            }
            @media (min-width:992px) {
                header#masthead.header-style-slim div#slim-header .left-half {
                    display: none;
                }
            }
            
        <?php endif; ?>

        /* ----- Mobile Nav: Fixed Logo Height ------------------------------ */

        @media (max-width:991px) {
            header img.custom-logo {
                padding: 0;
                height: <?php esc_attr_e( get_theme_mod( 'style_a_mobile_logo_height', 50 ) ) ?>px !important;
            }
        }

        /* ----- Banner Navbar: Logo Settings ------------------------------- */
        
        header#masthead.header-style-banner div#banner-header-wrap #custom-logo-wrap img.custom-logo {
            height: <?php esc_attr_e( get_theme_mod( 'navbar_banner_logo_height', 60 ) ) ?>px;
        }
        
        header#masthead.header-style-banner div#banner-header-wrap #custom-logo-wrap {
            padding-top: <?php esc_attr_e( get_theme_mod( 'navbar_banner_logo_top_spacing', 60 ) ) ?>px;
            padding-bottom: <?php esc_attr_e( get_theme_mod( 'navbar_banner_logo_bottom_spacing', 20 ) ) ?>px;
        }
        
        @media (max-width:991px) {
            header#masthead.header-style-banner div#banner-header-wrap #custom-logo-wrap img.custom-logo {
                height: <?php esc_attr_e( get_theme_mod( 'style_a_mobile_logo_height', 50 ) ) ?>px !important;
            }
            header#masthead.header-style-banner div#banner-header-wrap #custom-logo-wrap {
                padding-top: <?php esc_attr_e( get_theme_mod( 'navbar_banner_logo_top_spacing_mbl', 30 ) ) ?>px;
                padding-bottom: <?php esc_attr_e( get_theme_mod( 'navbar_banner_logo_bottom_spacing_mbl', 15 ) ) ?>px;
            }
        }
        
        <?php if ( get_theme_mod( 'navbar_banner_logo_alignment', 'left' ) == 'right' || get_theme_mod( 'navbar_banner_logo_alignment', 'left' ) == 'center' ) : ?>
        
            header#masthead.header-style-banner div#banner-header-wrap #custom-logo-wrap {
                text-align: <?php esc_attr_e( get_theme_mod( 'navbar_banner_logo_alignment', 'left' ) ); ?>;
            }
        
        <?php endif; ?>
        
        <?php if ( get_theme_mod( 'navbar_banner_menu_alignment', 'left' ) == 'right' || get_theme_mod( 'navbar_banner_menu_alignment', 'left' ) == 'center' ) : ?>
        
            <?php if ( get_theme_mod( 'navbar_banner_menu_alignment', 'left' ) == 'right' ) : ?>
            
                header#masthead.header-style-banner ul#banner-header-primary {
                    float: right;
                }
                
                header#masthead.header-style-banner #mobile-menu-trigger {
                    margin: 15px 15px 0 auto;
                }
                
                header#masthead.header-style-banner ul#mobile-menu {
                    text-align: right;
                }
            
            <?php else : ?>
        
                header#masthead.header-style-banner ul#banner-header-primary {
                    float: none;
                    margin: 0 auto;
                }
        
                header#masthead.header-style-banner #mobile-menu-trigger {
                    margin: 15px auto 0;
                }
                
                header#masthead.header-style-banner ul#mobile-menu {
                    text-align: center;
                }
                
            <?php endif; ?>
            
        <?php endif; ?>
        
        /* ---------------------------------------------------------------------
         * Blog
         * ------------------------------------------------------------------ */

        <?php

        switch ( get_theme_mod( DESIGNR_OPTIONS::BLOG_LAYOUT_NUM_COLS, DESIGNR_DEFAULTS::BLOG_LAYOUT_NUM_COLS ) ) :

            case '1col':
                $col_width = "100%";
                break;
            case '2col':
                $col_width = "50%";
                break;
            case '3col':
                $col_width = "33.333333%";
                break;
            case '4col':
                $col_width = "25%";
                break;
            default :
                $col_width = "33.333333%";

        endswitch;
        ?>

        @media (min-width:1200px) {
            .masonry-card-blog .blog_item_wrap,
            .masonry-card-blog .grid_sizer {
                width: <?php esc_attr_e( $col_width ); ?> !important;
            }
        }

        /* ----- Masonry Blog Cards: Border Radius -------------------------- */

        <?php $card_radius = get_theme_mod( DESIGNR_OPTIONS::BLOG_CARD_BORDER_RADIUS, DESIGNR_DEFAULTS::BLOG_CARD_BORDER_RADIUS ); ?>
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap {
            padding: <?php echo esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::BLOG_CARD_MOSAIC_GAP, DESIGNR_DEFAULTS::BLOG_CARD_MOSAIC_GAP ) ); ?>px;
        }
        
        .masonry-card-blog .blog_item_wrap img {
            border-radius: <?php esc_attr_e( $card_radius . 'px' . ' ' . $card_radius . 'px' ); ?> 0 0;
        }
        .masonry-card-blog .blog_item_wrap .blog_item,
        .masonry-card-blog .blog_item_wrap {
            border-radius: <?php esc_attr_e( $card_radius ); ?>px;
        }
        .masonry-card-blog .blog_item_wrap .inner-wrap {
            border-radius: 0 0 <?php esc_attr_e( $card_radius . 'px' . ' ' . $card_radius . 'px' ); ?>;
        }
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap .blog_item,
        .standard-stacked-blog .blog_item_wrap,
        .standard-stacked-blog .excerpt img.featured-image {
            border-radius: <?php esc_attr_e( $card_radius ); ?>px;
        }
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+1) > .blog_item > .inner-wrap,
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+6) > .blog_item > .inner-wrap {
            border-top-right-radius: <?php esc_attr_e( $card_radius ); ?>px;
            border-bottom-left-radius: <?php esc_attr_e( $card_radius ); ?>px;
        }
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+2) > .blog_item > .inner-wrap,
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+4) > .blog_item > .inner-wrap {
            border-top-left-radius: <?php esc_attr_e( $card_radius ); ?>px;
            border-bottom-right-radius: <?php esc_attr_e( $card_radius ); ?>px;
        }
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+3) > .blog_item > .inner-wrap,
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+7) > .blog_item > .inner-wrap {
            border-top-right-radius: <?php esc_attr_e( $card_radius ); ?>px;
            border-bottom-left-radius: <?php esc_attr_e( $card_radius ); ?>px;
        }
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+5) > .blog_item > .inner-wrap {
            border-top-left-radius: <?php esc_attr_e( $card_radius ); ?>px;
            border-bottom-right-radius: <?php esc_attr_e( $card_radius ); ?>px;
        }

        /* ----- Masonry Blog Cards: Hidden Categories Bar ------------------ */

        <?php if ( ! get_theme_mod( DESIGNR_OPTIONS::BLOG_SHOW_CATEGORY, DESIGNR_DEFAULTS::BLOG_SHOW_CATEGORY ) ) : ?>
            .blog_item_wrap .blog_item .footer-meta {
                padding-bottom: 0;
                border: none;
            }
            .masonry-card-blog .blog_item_wrap .blog_item .inner-wrap {
                padding-bottom: 15px;
            }
            .masonry-card-blog .blog_item_wrap:hover .blog_item .inner-wrap {
                border-radius: 0;
            }
        <?php endif; ?>

        /* ----- Masonry Blog Cards: Hidden Comment & View Counts ----------- */

        <?php if ( ! get_theme_mod( DESIGNR_OPTIONS::BLOG_SHOW_COMMENT_COUNT, DESIGNR_DEFAULTS::BLOG_SHOW_COMMENT_COUNT ) && ! get_theme_mod( 'blog_layout_show_view_count', false ) ) : ?>
            .masonry-card-blog .blog_item_wrap .blog_item .inner {
                padding-bottom: 15px;
            }
        <?php endif; ?>

        /* ----- Masonry Blog Cards: Typography ----------------------------- */

        .blog_item_wrap .blog_item .entry-title {
            font-size: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::BLOG_CARD_FONT_SIZE_DSK, DESIGNR_DEFAULTS::BLOG_CARD_FONT_SIZE_DSK ) ) ?>px;
        }

        .blog_item_wrap .blog_item .inner .blog-meta,
        .standard-stacked-blog .blog_item_wrap .blog_item .blog-meta .posted-meta,
        .standard-stacked-blog .blog-meta div.category-meta .categories-bar {
            font-size: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::BLOG_META_FONT_SIZE, DESIGNR_DEFAULTS::BLOG_META_FONT_SIZE ) ) ?>px;
        }

        @media (max-width: 767px) {
            .blog_item_wrap .blog_item .entry-title {
                font-size: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::BLOG_CARD_FONT_SIZE_MBL, DESIGNR_DEFAULTS::BLOG_CARD_FONT_SIZE_MBL ) ) ?>px;
            }
        }
        
        /* ----- Standard Blog Cards: Flat or Raised ------------------------ */
        
        <?php if ( get_theme_mod( DESIGNR_OPTIONS::BLOG_CARD_APPEARANCE, DESIGNR_DEFAULTS::BLOG_CARD_APPEARANCE ) == 'raised' ) : ?>
            
            .standard-stacked-blog .blog_item_wrap {
                box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.15);
                border: none;
            }
            
            .standard-stacked-blog .blog-meta div.category-meta, 
            .standard-stacked-blog .blog-meta div.posted-meta {
                border-bottom: thin solid #eeeeee;
            }
            
            .standard-stacked-blog .blog_item_wrap .blog_item .blog-meta .posted-meta {
                margin-bottom: 15px;
            }
            
            @media (max-width:767px) {
                .standard-stacked-blog .blog-meta div.posted-meta {
                    border-bottom: thin solid #eee;
                }
                .standard-stacked-blog .blog-meta div.category-meta {
                    border: none;
                }
            }
        
        <?php endif; ?>
        
        /* ---------------------------------------------------------------------
         * Custom Header
         * ------------------------------------------------------------------ */

        div#custom-header-content .custom-header-title,
        div#designr-custom-header.parallax_layers .custom-header-title {
            font-size: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_TITLE_FONT_SIZE, DESIGNR_DEFAULTS::CUSTOM_HEADER_TITLE_FONT_SIZE ) ) ?>px;
            letter-spacing: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_TITLE_LETTER_GAP, DESIGNR_DEFAULTS::CUSTOM_HEADER_TITLE_LETTER_GAP ) ) ?>em;
        }

        ul#custom-header-menu > li a {
            font-size: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_MENU_FONT_SIZE, DESIGNR_DEFAULTS::CUSTOM_HEADER_MENU_FONT_SIZE ) ) ?>px;
            letter-spacing: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_MENU_LETTER_GAP, DESIGNR_DEFAULTS::CUSTOM_HEADER_MENU_LETTER_GAP ) ) ?>em;
        }

        ul#custom-header-menu > li {
            margin: 2px <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_MENU_LINKS_GAP, DESIGNR_DEFAULTS::CUSTOM_HEADER_MENU_LINKS_GAP ) / 2 ) ?>px;
        }

        div#designr-custom-header.designr_parallax,
        div#designr-custom-header.designr_parallax .util-tbl-wrap,
        div#designr-custom-header.parallax_layers {
            height: <?php echo get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC ) == 'percent' ? esc_attr( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT ) . 'vh' ) : esc_attr( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PX, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX ) . 'px' ); ?>;
        }

        /* ----- Perspective Layer ------------------------------------------ */

        div#designr-custom-header.parallax_layers .jparallax-layer.texture-layer,
        div#designr-custom-header.parallax_layers .jparallax-layer.color-layer,
        div#designr-custom-header.parallax_layers .jparallax-layer.image-layer {
            width: 115vw;
            height: <?php echo get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC ) == 'percent' ? esc_attr( ( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT ) + 15 ) . 'vh' ) : esc_attr( ( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PX, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX ) * 1.15 ) . 'px' ); ?>;
            background-size: cover;
            background-position: 50%;
        }

        div#designr-custom-header.parallax_layers .jparallax-layer.texture-layer {
            opacity: <?php echo esc_attr( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_TEXTURE_OPAC, DESIGNR_DEFAULTS::CUSTOM_HEADER_TEXTURE_OPAC ) ); ?>;
        }

        div#designr-custom-header.parallax_layers .jparallax-layer.color-layer {
            opacity: <?php echo esc_attr( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_OPACITY, DESIGNR_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_OPACITY ) ); ?>;
        }

        div#designr-custom-header.designr_parallax div#custom-header-overlay.single,
        div#designr-custom-header.parallax_layers .jparallax-layer.color-layer.single {
            background: <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_single'], get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_OPACITY, DESIGNR_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_OPACITY ) ) ); ?>;
        }

        div#designr-custom-header.designr_parallax img.custom-logo,
        div#designr-custom-header.parallax_layers .jparallax-layer.content-layer img.custom-logo {
            height: <?php echo esc_attr( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_LOGO_HEIGHT, DESIGNR_DEFAULTS::CUSTOM_HEADER_LOGO_HEIGHT ) ); ?>px;
        }

        /* ----- Custom Header - Mobile Heights ----------------------------- */

        @media (max-width: 991px) {

            div#designr-custom-header.designr_parallax,
            div#designr-custom-header.designr_parallax .util-tbl-wrap,
            div#designr-custom-header.parallax_layers {
                height: <?php echo get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC ) == 'percent' ? esc_attr( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT_MBL, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT_MBL ) . 'vh' ) : esc_attr( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PX_MBL, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX_MBL ) . 'px' ); ?>;
            }

            div#designr-custom-header.parallax_layers .jparallax-layer.texture-layer,
            div#designr-custom-header.parallax_layers .jparallax-layer.color-layer,
            div#designr-custom-header.parallax_layers .jparallax-layer.image-layer {
                height: <?php echo get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC ) == 'percent' ? esc_attr( ( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT_MBL, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT_MBL ) + 15 ) . 'vh' ) : esc_attr( ( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PX_MBL, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX_MBL ) * 1.15 ) . 'px' ); ?>;
            }

            div#designr-custom-header.designr_parallax img.custom-logo,
            div#designr-custom-header.parallax_layers .jparallax-layer.content-layer img.custom-logo {
                height: <?php echo esc_attr( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_LOGO_HEIGHT_MBL, DESIGNR_DEFAULTS::CUSTOM_HEADER_LOGO_HEIGHT_MBL ) ); ?>px;
            }

        }

        /* ----- Match Height : Vertical Scroll Parallax Header Only ----- */
        
        <?php if ( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_STYLE, DESIGNR_DEFAULTS::NAVBAR_STYLE ) != 'banner' && get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC ) == 'percent' && get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT, DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT ) == 100 && get_theme_mod( 'custom_header_style_toggle', 'parallax_vertical' ) == 'parallax_vertical' ) : ?>
        
            div#designr-custom-header.designr_parallax,
            div#designr-custom-header.designr_parallax .util-tbl-wrap {
                height: calc(100vh - <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) - 1 ) ?>px);
            }
            
            body.admin-bar div#designr-custom-header.designr_parallax,
            body.admin-bar div#designr-custom-header.designr_parallax .util-tbl-wrap {
                height: calc(100vh - <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) - 1 + 32 ) ?>px);
            }

        <?php endif; ?>
        
        /* ----- Perspective Layer - Gradient Overlay ----------------------- */

        <?php
        switch ( get_theme_mod( DESIGNR_OPTIONS::GRADIENT_LINEAR_DIRECTION, DESIGNR_DEFAULTS::GRADIENT_LINEAR_DIRECTION ) ) :

            case 'down':
                $linear_degrees = '180deg';
                break;

            case 'right':
                $linear_degrees = '90deg';
                break;

            case 'left':
                $linear_degrees = '-90deg';
                break;

            default:
                $linear_degrees = '0deg';
                break;

        endswitch; ?>

        div#designr-custom-header.designr_parallax div#custom-header-overlay.gradient,
        div#designr-custom-header.parallax_layers .jparallax-layer.color-layer.gradient {
            <?php if ( get_theme_mod( DESIGNR_OPTIONS::GRADIENT_STYLE, DESIGNR_DEFAULTS::GRADIENT_STYLE ) == 'linear' ) : ?>

                background: -moz-linear-gradient(<?php echo esc_attr( $linear_degrees ); ?>,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_START_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_END_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);
                background: -webkit-linear-gradient(<?php echo esc_attr( $linear_degrees ); ?>,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_START_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_END_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);
                background: linear-gradient(<?php echo esc_attr( $linear_degrees ); ?>,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_START_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_END_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);

            <?php else : ?>

                background: -moz-radial-gradient(center, ellipse cover,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_START_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_END_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);
                background: -webkit-radial-gradient(center, ellipse cover,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_START_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_END_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);
                background: radial-gradient(center, ellipse cover,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_START_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( designr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( DESIGNR_OPTIONS::GRADIENT_END_COLOR_OPACITY, DESIGNR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);

            <?php endif; ?>
            opacity: <?php echo esc_attr( get_theme_mod( DESIGNR_OPTIONS::GRADIENT_OVERALL_OPACITY, DESIGNR_DEFAULTS::GRADIENT_OVERALL_OPACITY ) ); ?>;
        }

        /* ---------------------------------------------------------------------
         * Footer
         * ------------------------------------------------------------------ */

        h2.widget-title {
            font-size: <?php esc_attr_e( get_theme_mod( 'prefooter_widget_title_font_size', 24 ) ) ?>px;
            letter-spacing: <?php esc_attr_e( get_theme_mod( 'prefooter_widget_title_letter_spacing', '.250' ) ); ?>em;
        }
        
        footer div#footer-branding-wrap img.custom-logo {
            height: <?php echo esc_attr( get_theme_mod( 'designr_footer_logo_height', 30 ) ); ?>px;
        }
        
        div#footer-branding-wrap .site-title {
            font-size: <?php esc_attr_e( get_theme_mod( 'footer_site_title_font_size', 18 ) ) ?>px;
            letter-spacing: <?php esc_attr_e( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_SITE_TITLE_LETTER_GAP, DESIGNR_DEFAULTS::NAVBAR_SITE_TITLE_LETTER_GAP ) ); ?>em;
        }

        footer div#footer-branding-wrap {
            font-size: <?php esc_attr_e( get_theme_mod( 'footer_copyright_font_size', 12 ) ) ?>px;
        }

        <?php if ( ! get_theme_mod( 'footer_show_branding', true ) && ! get_theme_mod( 'footer_show_copyright', true ) ) : ?>
            footer span.designr_by {
                padding-left: 0;
                border-left: none;
            }
        <?php endif; ?>
        
        <?php if ( get_theme_mod( 'footer_show_branding', true ) && ! get_theme_mod( 'footer_show_copyright', true ) ) : ?>
        
            footer span.designr_by {
                margin-left: 15px;
            }
        
        <?php endif; ?>
            
        /* ---------------------------------------------------------------------
         * Slide-In Cart
         * ------------------------------------------------------------------ */
            
        <?php if ( get_theme_mod( 'cart_drawer_tab_location', 'bottom' ) == 'top' ) : ?>
        
            @media (min-width:992px) {
        
                div#cart-panel-trigger {
                    top: <?php esc_attr_e( get_theme_mod( 'style_a_collapse_height', 50 ) + 12 ) ?>px;    
                }

                div#cart-panel-trigger.sticky-header {
                    top: <?php esc_attr_e( get_theme_mod( 'style_a_expand_height', 75 ) + 12 ) ?>px;
                }
            
            }
        
        <?php endif; ?>
            
            
    </style>

<?php
}
add_action( 'wp_head', 'designr_wp_head_styles' );
