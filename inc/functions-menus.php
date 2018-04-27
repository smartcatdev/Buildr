<?php

/**
 * Render the Mobile Menu
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_mobile_menu() { ?>
                        
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
        
            <?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
            
                <?php wp_nav_menu( array( 
                    'theme_location'    => 'primary-menu', 
                    'menu_id'           => 'mobile-menu',
                ) ); ?>
            
            <?php elseif ( has_nav_menu( 'split-primary-left' ) ) : ?>
            
                <?php wp_nav_menu( array( 
                    'theme_location'    => 'split-primary-left', 
                    'menu_id'           => 'mobile-menu',
                ) ); ?>
            
            <?php else : ?>
        
                <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

                    <ul id="mobile-menu">

                        <li class="menu-item menu-item-type-custom menu-item-object-custom">

                            <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                               <?php esc_html_e( 'Add a Mobile Menu?', 'buildr' ); ?>
                            </a>

                        </li>

                    </ul>

                <?php endif; ?>
            
            <?php endif; ?>
        
        <?php endif; ?>

    </div>

<?php }
add_action( 'buildr_mobile_menu', 'buildr_render_mobile_menu');        