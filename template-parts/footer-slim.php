<footer id="colophon" class="site-footer footer-style-slim">

    <div id="slim-footer-wrap">

        <div id="slim-footer" class="<?php echo get_theme_mod( 'boxed_footer', 'no' ) == 'yes' ? 'container' : ''; ?>">

            <div id="footer-branding-wrap">

                <?php if ( get_theme_mod( 'footer_branding', 'site_title' ) == 'alt_logo' ) : ?>

                    <?php if ( get_theme_mod( 'alternate_logo', '' ) && get_theme_mod( 'alternate_logo', '' ) != '' ) : ?>

                        <img class="custom-logo alternate" src="<?php echo esc_url( get_theme_mod( 'alternate_logo', '' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">

                    <?php endif; ?>

                <?php else : ?>

                    <h3 class="site-title">
                        <?php echo get_bloginfo('name'); ?>
                    </h3>

                <?php endif; ?>

            </div>

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

</footer><!-- #colophon -->
