<footer id="colophon" class="site-footer footer-style-slim">

    <?php if ( get_theme_mod( 'footer_show_social', 'no' ) == 'yes' ) : ?>
    
        <div id="slim-footer-social">
        
            <div class="footer-social">
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
    
    <div id="slim-footer-wrap">

        <div id="slim-footer" class="<?php echo get_theme_mod( 'boxed_footer', 'no' ) == 'yes' ? 'container' : ''; ?>">

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
                        <?php esc_html_e( get_theme_mod( 'footer_copyright_tagline', __( '© 2018 Your Company', 'designr' ) ) ); ?>
                    </div>

                <?php endif; ?>
                
            </div>
                            
            <div class="footer-designer">

                <?php do_action('designr_designer'); ?>

            </div>

        </div>

    </div>

</footer><!-- #colophon -->
