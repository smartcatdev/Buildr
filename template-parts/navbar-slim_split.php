<header id="masthead" class="site-header header-style-split">

    <div id="slim-header-wrap">

        <div id="slim-header">

            <div class="left-half">

                <?php if ( has_nav_menu( 'split-primary-left' ) ) : ?>

                    <?php wp_nav_menu( array( 
                        'theme_location'    => 'split-primary-left', 
                        'menu_id'           => 'slim-header-a',
                        'menu_class'        => 'slim-header-menu' 
                    ) ); ?>

                <?php else : ?>

                    <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

                        <ul id="slim-header-a" class="slim-header-menu">

                            <li class="menu-item menu-item-type-custom menu-item-object-custom">

                                <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                   <?php esc_html_e( 'Add a Left Menu?', 'buildr' ); ?>
                                </a>

                            </li>

                        </ul>

                    <?php endif; ?>

                <?php endif; ?>

            </div>

            <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() && get_theme_mod( BUILDR_OPTIONS::NAVBAR_BRANDING_WHAT_TO_SHOW, BUILDR_DEFAULTS::NAVBAR_BRANDING_WHAT_TO_SHOW ) == 'logo' ) : ?>

                <div id="custom-logo-wrap" class="has-logo <?php echo ! get_theme_mod( BUILDR_OPTIONS::NAVBAR_ALWAYS_SHOW_LOGO, BUILDR_DEFAULTS::NAVBAR_ALWAYS_SHOW_LOGO ) ? 'sometimes-hidden' : ''; ?>">
            
                    <?php the_custom_logo(); ?>

                </div>
                    
            <?php else : ?> 
            
                <div id="custom-logo-wrap" class="<?php echo ! get_theme_mod( BUILDR_OPTIONS::NAVBAR_ALWAYS_SHOW_LOGO, BUILDR_DEFAULTS::NAVBAR_ALWAYS_SHOW_LOGO ) ? 'sometimes-hidden' : ''; ?>">
            
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
            
            <div class="right-half">

                <?php if ( has_nav_menu( 'split-primary-right' ) ) : ?>

                    <?php wp_nav_menu( array( 
                        'theme_location'    => 'split-primary-right', 
                        'menu_id'           => 'slim-header-b',
                        'menu_class'        => 'slim-header-menu' 
                    ) ); ?>

                <?php else : ?>

                    <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

                        <ul id="slim-header-b" class="slim-header-menu">

                            <li class="menu-item menu-item-type-custom menu-item-object-custom">

                                <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                   <?php esc_html_e( 'Add a Right Menu?', 'buildr' ); ?>
                                </a>

                            </li>

                        </ul>

                    <?php endif; ?>

                <?php endif; ?>

            </div>

            <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_SHOW_SOCIAL, BUILDR_DEFAULTS::NAVBAR_SHOW_SOCIAL ) ) : ?>
            
                <div class="left-half split-social">

                    <div class="navbar-social">
                        
                        <a id="split-social-trigger" class="navbar-icon">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                                <path fill="<?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::NAVBAR_FG_COLOR, BUILDR_DEFAULTS::NAVBAR_FG_COLOR ) ); ?>" d="M10.707 10.5l5.646-5.646c0.195-0.195 0.195-0.512 0-0.707s-0.512-0.195-0.707 0l-5.646 5.646-5.646-5.646c-0.195-0.195-0.512-0.195-0.707 0s-0.195 0.512 0 0.707l5.646 5.646-5.646 5.646c-0.195 0.195-0.195 0.512 0 0.707 0.098 0.098 0.226 0.146 0.354 0.146s0.256-0.049 0.354-0.146l5.646-5.646 5.646 5.646c0.098 0.098 0.226 0.146 0.354 0.146s0.256-0.049 0.354-0.146c0.195-0.195 0.195-0.512 0-0.707l-5.646-5.646z"></path>
                            </svg>
                        </a>
                        
                        <?php if ( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_1, BUILDR_DEFAULTS::SOCIAL_ICON_1 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BUILDR_OPTIONS::SOCIAL_URL_1, BUILDR_DEFAULTS::SOCIAL_URL_1 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_1, BUILDR_DEFAULTS::SOCIAL_ICON_1 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_2, BUILDR_DEFAULTS::SOCIAL_ICON_2 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BUILDR_OPTIONS::SOCIAL_URL_2, BUILDR_DEFAULTS::SOCIAL_URL_2 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_2, BUILDR_DEFAULTS::SOCIAL_ICON_2 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_3, BUILDR_DEFAULTS::SOCIAL_ICON_3 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BUILDR_OPTIONS::SOCIAL_URL_3, BUILDR_DEFAULTS::SOCIAL_URL_3 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_3, BUILDR_DEFAULTS::SOCIAL_ICON_3 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_4, BUILDR_DEFAULTS::SOCIAL_ICON_4 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BUILDR_OPTIONS::SOCIAL_URL_4, BUILDR_DEFAULTS::SOCIAL_URL_4 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_4, BUILDR_DEFAULTS::SOCIAL_ICON_4 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_5, BUILDR_DEFAULTS::SOCIAL_ICON_5 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BUILDR_OPTIONS::SOCIAL_URL_5, BUILDR_DEFAULTS::SOCIAL_URL_5 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_5, BUILDR_DEFAULTS::SOCIAL_ICON_5 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>
                        
                    </div>

                </div>
            
            <?php endif; ?>
            
            <?php do_action( 'buildr_mobile_menu' ); ?>

        </div>
        
        <div id="split-social-slide-in">
            
            <?php if ( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_1, BUILDR_DEFAULTS::SOCIAL_ICON_1 ) != '' ) : ?>
                <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BUILDR_OPTIONS::SOCIAL_URL_1, BUILDR_DEFAULTS::SOCIAL_URL_1 ) ); ?>">
                    <span class="fab <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_1, BUILDR_DEFAULTS::SOCIAL_ICON_1 ) ); ?>"></span>
                </a>
            <?php endif; ?>

            <?php if ( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_2, BUILDR_DEFAULTS::SOCIAL_ICON_2 ) != '' ) : ?>
                <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BUILDR_OPTIONS::SOCIAL_URL_2, BUILDR_DEFAULTS::SOCIAL_URL_2 ) ); ?>">
                    <span class="fab <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_2, BUILDR_DEFAULTS::SOCIAL_ICON_2 ) ); ?>"></span>
                </a>
            <?php endif; ?>

            <?php if ( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_3, BUILDR_DEFAULTS::SOCIAL_ICON_3 ) != '' ) : ?>
                <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BUILDR_OPTIONS::SOCIAL_URL_3, BUILDR_DEFAULTS::SOCIAL_URL_3 ) ); ?>">
                    <span class="fab <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_3, BUILDR_DEFAULTS::SOCIAL_ICON_3 ) ); ?>"></span>
                </a>
            <?php endif; ?>

            <?php if ( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_4, BUILDR_DEFAULTS::SOCIAL_ICON_4 ) != '' ) : ?>
                <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BUILDR_OPTIONS::SOCIAL_URL_4, BUILDR_DEFAULTS::SOCIAL_URL_4 ) ); ?>">
                    <span class="fab <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_4, BUILDR_DEFAULTS::SOCIAL_ICON_4 ) ); ?>"></span>
                </a>
            <?php endif; ?>

            <?php if ( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_5, BUILDR_DEFAULTS::SOCIAL_ICON_5 ) != '' ) : ?>
                <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BUILDR_OPTIONS::SOCIAL_URL_5, BUILDR_DEFAULTS::SOCIAL_URL_5 ) ); ?>">
                    <span class="fab <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::SOCIAL_ICON_5, BUILDR_DEFAULTS::SOCIAL_ICON_5 ) ); ?>"></span>
                </a>
            <?php endif; ?>
            
        </div>

    </div>

</header>