<header id="masthead" class="site-header header-style-banner">

    <div id="banner-header-wrap">

        <div id="banner-header" class="<?php echo get_theme_mod( 'style_a_boxed_navbar', false ) ? 'container' : ''; ?>">

            <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>

                <div id="custom-logo-wrap" class="has-logo">
            
                    <?php the_custom_logo(); ?>

                </div>
                    
            <?php else : ?> 
            
                <div id="custom-logo-wrap">
            
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
            
            <div id="banner-header-menu-wrap">

                <?php if ( has_nav_menu( 'slim-primary' ) ) : ?>

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
                                   <?php _e( 'Add a Primary Menu?', 'designr' ); ?>
                                </a>

                            </li>

                        </ul>
                
                    <?php endif; ?>

                <?php endif; ?>
            
                <div class="clear"></div>
                
            </div>
            
        </div>

    </div>

</header>