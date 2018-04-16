<header id="masthead" class="site-header header-style-banner">

    <div id="banner-header-wrap">

        <div id="banner-header" class="<?php echo get_theme_mod( BUILDR_OPTIONS::NAVBAR_BOXED_CONTENT, BUILDR_DEFAULTS::NAVBAR_BOXED_CONTENT ) ? 'container' : ''; ?>">

            <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() && get_theme_mod( BUILDR_OPTIONS::NAVBAR_BRANDING_WHAT_TO_SHOW, BUILDR_DEFAULTS::NAVBAR_BRANDING_WHAT_TO_SHOW ) == 'logo' ) : ?>

                <div id="custom-logo-wrap" class="has-logo">
            
                    <?php the_custom_logo(); ?>

                </div>
                    
            <?php else : ?> 
            
                <div id="custom-logo-wrap">
            
                    <div class="site-branding">
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url() ); ?>">
                                <?php echo esc_html( get_bloginfo('name') ); ?>
                            </a>
                        </h1>
                        <?php if ( get_bloginfo( 'name' ) ) : ?>
                            <p class="site-tagline">
                                <a href="<?php echo esc_url( home_url() ); ?>">
                                    <?php echo esc_html( get_bloginfo( 'description' ) ); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    </div>

                </div>
            
            <?php endif; ?> 
            
            <div id="banner-header-menu-wrap">

                <?php if ( has_nav_menu( 'banner-primary' ) ) : ?>

                    <?php wp_nav_menu( array( 
                        'theme_location'    => 'banner-primary', 
                        'menu_id'           => 'banner-header-primary',
                        'menu_class'        => 'slim-header-menu' 
                    ) ); ?>

                <?php else : ?>

                    <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

                        <ul id="banner-header-primary" class="slim-header-menu">

                            <li class="menu-item menu-item-type-custom menu-item-object-custom">

                                <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                   <?php _e( 'Add a Primary Menu?', 'buildr' ); ?>
                                </a>

                            </li>

                        </ul>
                
                    <?php endif; ?>

                <?php endif; ?>
            
                <div class="clear"></div>
                
            </div>
            
            <div id="mobile-menu-wrap">
                
                <div id="mobile-menu-trigger">
                    <div class="bar"></div>
                </div>
                
                <?php if ( has_nav_menu( 'mobile-menu' ) ) : ?>

                    <?php wp_nav_menu( array( 
                        'theme_location'    => 'mobile-menu', 
                        'menu_id'           => 'mobile-menu',
                    ) ); ?>

                <?php else : ?>

                    <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

                        <ul id="mobile-menu">

                            <li class="menu-item menu-item-type-custom menu-item-object-custom">

                                <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                   <?php _e( 'Add a Mobile Menu?', 'buildr' ); ?>
                                </a>

                            </li>

                        </ul>

                    <?php endif; ?>

                <?php endif; ?>
                
            </div>
            
        </div>

    </div>

</header>