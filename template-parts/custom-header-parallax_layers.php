<?php $header_image = get_header_image(); ?>
    
<div id="designr-custom-header" class="parallax_layers jparallax-viewport" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/images/sougwen.jpg' ); ?>); height: <?php echo get_theme_mod( 'designr_custom_header_height_unit', 'percent' ) == 'percent' ? esc_attr( get_theme_mod( 'designr_custom_header_height_percent', 50 ) . 'vh' ) : esc_attr( get_theme_mod( 'designr_custom_header_height_pixels', 500 ) . 'px' ); ?>;">

    <div class="jparallax-layer texture-layer" style="background-image: url(<?php echo esc_url( get_theme_mod( 'parallax_layers_texture_pattern', '' ) ); ?>)">
    
    </div>

    <div class="jparallax-layer bg-layer" style="background: linear-gradient(190deg, rgba(52, 138, 167, 1) 0%, hsla(242, 60%, 35%, .85) 100%);">
    
    </div>
    
    <div class="jparallax-layer content-layer">
        
        <div class="container">

            <div class="row">

                <div class="col-sm-8 col-sm-offset-2 text-center">
        
                    <?php if ( get_theme_mod( 'custom_header_show_heading', 'yes' ) == 'yes' ) : ?>

                        <h2 class="custom-header-title">

                            <?php 
                            switch ( get_theme_mod( 'custom_header_title_content', 'site_title' ) ) :

                                case 'site_title' :
                                    echo get_bloginfo('name');
                                    break;

                                case 'site_description' :
                                    echo get_bloginfo('description');
                                    break;

                                default :
                                    echo get_bloginfo('name');

                            endswitch; ?>

                        </h2>

                    <?php endif; ?>

                    <?php if ( get_theme_mod( 'custom_header_show_menu', 'yes' ) == 'yes' ) : ?>

                        <?php if ( has_nav_menu( 'custom-header' ) ) : ?>

                            <?php wp_nav_menu( array( 
                                'theme_location'    => 'custom-header', 
                                'menu_id'           => 'custom-header-menu',
                                'menu_class'        => '',
                            ) ); ?>

                        <?php else : ?>

                            <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

                                <ul id="custom-header-menu" class="">

                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">

                                        <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                           <?php _e( 'Add a Custom Header Menu?', 'designr' ); ?>
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