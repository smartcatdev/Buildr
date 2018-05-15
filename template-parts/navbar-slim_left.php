<header id="masthead" class="site-header header-style-slim">

    <div id="slim-header-wrap">

        <div id="slim-header" class="<?php echo get_theme_mod( BUILDR_OPTIONS::NAVBAR_BOXED_CONTENT, BUILDR_DEFAULTS::NAVBAR_BOXED_CONTENT ) ? 'container' : ''; ?>">

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

                <?php if ( has_nav_menu( 'primary-menu' ) ) : ?>

                    <?php wp_nav_menu( array( 
                        'theme_location'    => 'primary-menu', 
                        'menu_id'           => 'slim-header-primary',
                        'menu_class'        => 'slim-header-menu' 
                    ) ); ?>

                <?php else : ?>

                    <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

                        <ul id="slim-header-primary" class="slim-header-menu">

                            <li class="menu-item menu-item-type-custom menu-item-object-custom">

                                <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                   <?php esc_html_e( 'Add a Primary Menu?', 'buildr' ); ?>
                                </a>

                            </li>

                        </ul>

                    <?php endif; ?>

                <?php endif; ?>

            </div>
            
            <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_SHOW_SOCIAL, BUILDR_DEFAULTS::NAVBAR_SHOW_SOCIAL ) ) : ?>
            
                <div class="left-half">

                    <div class="navbar-social">

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

    </div>

</header>