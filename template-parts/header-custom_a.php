<header id="masthead" class="site-header">

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
                                   <?php _e( 'Add a Left Menu?', 'designr' ); ?>
                                </a>

                            </li>

                        </ul>

                    <?php endif; ?>

                <?php endif; ?>

            </div>

            <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>

                <div id="custom-logo-wrap">
            
                    <?php the_custom_logo(); ?>

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
                                   <?php _e( 'Add a Right Menu?', 'designr' ); ?>
                                </a>

                            </li>

                        </ul>

                    <?php endif; ?>

                <?php endif; ?>

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