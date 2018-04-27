<?php $header_image = get_header_image(); ?>

<div id="buildr-custom-header" class="buildr_parallax" data-plx-img="<?php echo esc_url( $header_image ); ?>">

    <div id="custom-header-overlay" class="<?php echo get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_STYLE, BUILDR_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_STYLE ) == 'no' ? '' : esc_attr( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_STYLE, BUILDR_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_STYLE ) ); ?>">
    </div>

    <div id="custom-header-content" data-stellar-offset-parent="true">

        <div class="container">

            <div class="row">

                <div class="col-sm-8 col-sm-offset-2">

                    <div class="util-tbl-wrap" style="">

                        <div class="util-tbl-inner util-vert-mid text-center">

                            <?php if ( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_SHOW_LOGO, BUILDR_DEFAULTS::CUSTOM_HEADER_SHOW_LOGO ) && function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>

                                <?php the_custom_logo(); ?>

                            <?php endif; ?>
                            
                            <?php if ( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_SHOW_TITLE, BUILDR_DEFAULTS::CUSTOM_HEADER_SHOW_TITLE ) ) : ?>

                                <h2 class="custom-header-title textillate wow">

                                    <?php 
                                    switch ( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_TITLE_CONTENT, BUILDR_DEFAULTS::CUSTOM_HEADER_TITLE_CONTENT ) ) :

                                        case 'site_title' :
                                            echo esc_html( get_bloginfo('name') );
                                            break;

                                        case 'site_description' :
                                            echo esc_html( get_bloginfo('description') );
                                            break;

                                        default :
                                            echo esc_html( get_bloginfo('name') );

                                    endswitch; ?>

                                </h2>

                            <?php endif; ?>

                            <?php if ( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_SHOW_MENU, BUILDR_DEFAULTS::CUSTOM_HEADER_SHOW_MENU ) ) : ?>

                                <?php if ( has_nav_menu( 'custom-header' ) ) : ?>

                                    <?php wp_nav_menu( array( 
                                        'theme_location'    => 'custom-header', 
                                        'menu_id'           => 'custom-header-menu',
                                    ) ); ?>

                                <?php else : ?>

                                    <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

                                        <ul id="custom-header-menu">

                                            <li class="menu-item menu-item-type-custom menu-item-object-custom">

                                                <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                                   <?php esc_html_e( 'Add a Custom Header Menu?', 'buildr' ); ?>
                                                </a>

                                            </li>

                                        </ul>

                                    <?php endif; ?>

                                <?php endif; ?>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>