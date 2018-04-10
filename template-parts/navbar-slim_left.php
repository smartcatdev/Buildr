<header id="masthead" class="site-header header-style-slim">

    <div id="slim-header-wrap">

        <div id="slim-header" class="<?php echo get_theme_mod( DESIGNR_OPTIONS::NAVBAR_BOXED_CONTENT, DESIGNR_DEFAULTS::NAVBAR_BOXED_CONTENT ) ? 'container' : ''; ?>">

            <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>

                <div id="custom-logo-wrap" class="has-logo <?php echo ! get_theme_mod( DESIGNR_OPTIONS::NAVBAR_ALWAYS_SHOW_LOGO, DESIGNR_DEFAULTS::NAVBAR_ALWAYS_SHOW_LOGO ) ? 'sometimes-hidden' : ''; ?>">
            
                    <?php the_custom_logo(); ?>

                </div>
                    
            <?php else : ?> 
            
                <div id="custom-logo-wrap" class="<?php echo ! get_theme_mod( DESIGNR_OPTIONS::NAVBAR_ALWAYS_SHOW_LOGO, DESIGNR_DEFAULTS::NAVBAR_ALWAYS_SHOW_LOGO ) ? 'sometimes-hidden' : ''; ?>">
            
                    <div class="site-branding">
                        <h1 class="site-title">
                            <?php echo esc_html( get_bloginfo('name') ); ?>
                        </h1>
                        <?php if ( get_bloginfo( 'name' ) ) : ?>
                            <p class="site-tagline">
                                <?php echo esc_html( get_bloginfo( 'description' ) ); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                </div>
            
            <?php endif; ?> 
            
            <div class="right-half">

                <?php if ( has_nav_menu( 'slim-primary' ) ) : ?>

                    <?php wp_nav_menu( array( 
                        'theme_location'    => 'slim-primary', 
                        'menu_id'           => 'slim-header-primary',
                        'menu_class'        => 'slim-header-menu' 
                    ) ); ?>

                <?php else : ?>

                    <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

                        <ul id="slim-header-primary" class="slim-header-menu">

                            <li class="menu-item menu-item-type-custom menu-item-object-custom">

                                <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                   <?php _e( 'Add a Primary Menu?', 'designr' ); ?>
                                </a>

                            </li>

                        </ul>

                    <?php endif; ?>

                <?php endif; ?>

            </div>
            
            <?php if ( get_theme_mod( DESIGNR_OPTIONS::NAVBAR_SHOW_SOCIAL, DESIGNR_DEFAULTS::NAVBAR_SHOW_SOCIAL ) ) : ?>
            
                <div class="left-half">

                    <div class="navbar-social">

                        <?php if ( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_ICON_1, DESIGNR_DEFAULTS::SOCIAL_ICON_1 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php esc_url( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_URL_1, DESIGNR_DEFAULTS::SOCIAL_URL_1 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_ICON_1, DESIGNR_DEFAULTS::SOCIAL_ICON_1 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_ICON_2, DESIGNR_DEFAULTS::SOCIAL_ICON_2 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php esc_url( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_URL_2, DESIGNR_DEFAULTS::SOCIAL_URL_2 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_ICON_2, DESIGNR_DEFAULTS::SOCIAL_ICON_2 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_ICON_3, DESIGNR_DEFAULTS::SOCIAL_ICON_3 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php esc_url( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_URL_3, DESIGNR_DEFAULTS::SOCIAL_URL_3 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_ICON_3, DESIGNR_DEFAULTS::SOCIAL_ICON_3 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_ICON_4, DESIGNR_DEFAULTS::SOCIAL_ICON_4 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php esc_url( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_URL_4, DESIGNR_DEFAULTS::SOCIAL_URL_4 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_ICON_4, DESIGNR_DEFAULTS::SOCIAL_ICON_4 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_ICON_5, DESIGNR_DEFAULTS::SOCIAL_ICON_5 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php esc_url( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_URL_5, DESIGNR_DEFAULTS::SOCIAL_URL_5 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( DESIGNR_OPTIONS::SOCIAL_ICON_5, DESIGNR_DEFAULTS::SOCIAL_ICON_5 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>

                    </div>

                </div>
            
            <?php endif; ?>

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
                                   <?php _e( 'Add a Mobile Menu?', 'designr' ); ?>
                                </a>

                            </li>

                        </ul>

                    <?php endif; ?>

                <?php endif; ?>
                
            </div>

        </div>

    </div>

</header>