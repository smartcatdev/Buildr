<footer id="colophon" class="site-footer footer-style-slim">
    
    <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
    
        <div id="pre-footer-wrap">

            <div id="pre-footer" class="container">

                <div class="row">

                    <?php dynamic_sidebar( 'sidebar-footer' ); ?>

                </div>

                <div class="clear"></div>

            </div>

        </div>
    
    <?php endif; ?>
    
    <div id="slim-footer-wrap">

        <div id="slim-footer" class="<?php echo get_theme_mod( DESIGNR_OPTIONS::FOOTER_CENTER_BRANDING, DESIGNR_DEFAULTS::FOOTER_CENTER_BRANDING ) ? 'centered' : ''; ?> <?php echo get_theme_mod( DESIGNR_OPTIONS::FOOTER_BOXED_CONTENT, DESIGNR_DEFAULTS::FOOTER_BOXED_CONTENT ) && ! get_theme_mod( DESIGNR_OPTIONS::FOOTER_CENTER_BRANDING, DESIGNR_DEFAULTS::FOOTER_CENTER_BRANDING ) ? 'container' : ''; ?>">

            <div id="footer-branding-wrap">

                <?php if ( get_theme_mod( DESIGNR_OPTIONS::FOOTER_SHOW_BRANDING, DESIGNR_DEFAULTS::FOOTER_SHOW_BRANDING ) ) : ?>
                
                    <?php if ( get_theme_mod( DESIGNR_OPTIONS::FOOTER_BRANDING_TYPE, DESIGNR_DEFAULTS::FOOTER_BRANDING_TYPE ) == 'alt_logo' ) : ?>

                        <?php if ( get_theme_mod( DESIGNR_OPTIONS::FOOTER_ALTERNATE_LOGO, DESIGNR_DEFAULTS::FOOTER_ALTERNATE_LOGO ) && get_theme_mod( DESIGNR_OPTIONS::FOOTER_ALTERNATE_LOGO, DESIGNR_DEFAULTS::FOOTER_ALTERNATE_LOGO ) != '' ) : ?>

                            <img class="custom-logo alternate" src="<?php echo esc_url( get_theme_mod( DESIGNR_OPTIONS::FOOTER_ALTERNATE_LOGO, DESIGNR_DEFAULTS::FOOTER_ALTERNATE_LOGO ) ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">

                        <?php endif; ?>

                    <?php else : ?>

                        <h3 class="site-title">
                            <?php echo esc_html( get_bloginfo('name') ); ?>
                        </h3>

                    <?php endif; ?>
                        
                <?php endif; ?>

                <?php if ( get_theme_mod( DESIGNR_OPTIONS::FOOTER_SHOW_COPYRIGHT, DESIGNR_DEFAULTS::FOOTER_SHOW_COPYRIGHT ) ) : ?>

                    <div class="footer-copyright">
                        <?php esc_html_e( get_theme_mod( DESIGNR_OPTIONS::FOOTER_COPYRIGHT_TAGLINE, DESIGNR_DEFAULTS::FOOTER_COPYRIGHT_TAGLINE ), 'designr' ); ?>
                    </div>

                <?php endif; ?>
                
                <?php do_action('designr_designer'); ?>
                            
            </div>
            
            <div id="footer-social">
                            
                <?php if ( get_theme_mod( DESIGNR_OPTIONS::FOOTER_SHOW_SOCIAL, DESIGNR_DEFAULTS::FOOTER_SHOW_SOCIAL ) ) : ?>

                    <div class="footer-social">
                        
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

                <?php endif; ?>
                
            </div>
                            
        </div>

    </div>

</footer><!-- #colophon -->
