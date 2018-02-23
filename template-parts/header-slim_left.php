<header id="masthead" class="site-header header-style-slim">

    <div id="slim-header-wrap">

        <div id="slim-header" class="<?php echo get_theme_mod( 'style_a_boxed_navbar', 'no' ) == 'yes' ? 'container' : ''; ?>">

            <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>

                <div id="custom-logo-wrap" class="<?php echo get_theme_mod( 'style_a_always_show_logo', 'no' ) == 'no' ? 'sometimes-hidden' : ''; ?>">
            
                    <?php the_custom_logo(); ?>

                </div>
                    
            <?php else : ?> 
            
                <div id="custom-logo-wrap" class="<?php echo get_theme_mod( 'style_a_always_show_logo', 'no' ) == 'no' ? 'sometimes-hidden' : ''; ?>">
            
                    <div class="site-branding">
                        <h1 class="site-title">
                            <?php echo get_bloginfo('name'); ?>
                        </h1>
                        <?php if ( get_bloginfo( 'name' ) ) : ?>
                            <p class="site-tagline">
                                <?php echo get_bloginfo( 'description' ); ?>
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
            
            <?php if ( get_theme_mod( 'navbar_show_social', 'no' ) == 'yes' ) : ?>
            
                <div class="left-half">

                    <div class="navbar-social">
                        <?php for ( $ctr = 1; $ctr < 6; $ctr++ ) : ?>

                            <?php if ( get_theme_mod( 'social_icon_' . $ctr . '_url', '' ) != '' ) : ?>
                                <a class="navbar-icon" href="<?php esc_attr_e( get_theme_mod( 'social_icon_' . $ctr . '_url', '' ) ); ?>">
                                    <span class="fab <?php esc_attr_e( get_theme_mod( 'social_icon_' . $ctr . '_icon', '' ) ); ?>"></span>
                                </a>
                            <?php endif; ?>

                        <?php endfor; ?>
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