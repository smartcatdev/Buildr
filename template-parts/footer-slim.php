<footer id="colophon" class="site-footer footer-style-slim">
    
    <div id="pre-footer-wrap">
    
        <div id="pre-footer" class="container">
    
            <div class="row">

                <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>

                    <?php dynamic_sidebar( 'footer' ); ?>

                <?php endif; ?>

            </div>

            <div class="clear"></div>
        
        </div>
        
    </div>
    
    <div id="slim-footer-wrap">

        <div id="slim-footer" class="<?php echo get_theme_mod( 'centered_footer_branding', 'no' ) == 'yes' ? 'centered' : ''; ?> <?php echo get_theme_mod( 'boxed_footer', 'no' ) == 'yes' && get_theme_mod( 'centered_footer_branding', 'no' ) == 'no' ? 'container' : ''; ?>">

            <div id="footer-branding-wrap">

                <?php if ( get_theme_mod( 'footer_show_branding', 'yes' ) == 'yes' ) : ?>
                
                    <?php if ( get_theme_mod( 'footer_branding', 'site_title' ) == 'alt_logo' ) : ?>

                        <?php if ( get_theme_mod( 'alternate_logo', '' ) && get_theme_mod( 'alternate_logo', '' ) != '' ) : ?>

                            <img class="custom-logo alternate" src="<?php echo esc_url( get_theme_mod( 'alternate_logo', '' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">

                        <?php endif; ?>

                    <?php else : ?>

                        <h3 class="site-title">
                            <?php echo esc_html( get_bloginfo('name') ); ?>
                        </h3>

                    <?php endif; ?>
                        
                <?php endif; ?>

                <?php if ( get_theme_mod( 'footer_show_copyright', 'yes' ) == 'yes' ) : ?>

                    <div class="footer-copyright">
                        <?php esc_html_e( get_theme_mod( 'footer_copyright_tagline', __( 'Copyright © 2018 Your Company', 'designr' ) ) ); ?>
                    </div>

                <?php endif; ?>
                
                <?php do_action('designr_designer'); ?>
                            
            </div>
            
            <div id="footer-social">
                            
                <?php if ( get_theme_mod( 'footer_show_social', 'no' ) == 'yes' ) : ?>

                    <div class="footer-social">
                        <?php for ( $ctr = 1; $ctr < 6; $ctr++ ) : ?>

                            <?php if ( get_theme_mod( 'social_icon_' . $ctr . '_url', '' ) != '' ) : ?>
                                <a class="navbar-icon" href="<?php esc_attr_e( get_theme_mod( 'social_icon_' . $ctr . '_url', '' ) ); ?>">
                                    <span class="fab <?php esc_attr_e( get_theme_mod( 'social_icon_' . $ctr . '_icon', '' ) ); ?>"></span>
                                </a>
                            <?php endif; ?>

                        <?php endfor; ?>
                    </div>

                <?php endif; ?>
                
            </div>
                            
        </div>

    </div>

</footer><!-- #colophon -->
