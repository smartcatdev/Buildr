<div class="wrap" id="buildr-docs">
    
    <h2>
        <?php esc_html_e( 'Buildr Theme Guide & Documentation', 'buildr' ); ?>
    </h2>
    
    <div id="buildr-flex-wrap">
    
        <div id="buildr-docs-menu">
            
            <ul class="parent-nav">

                <?php buildr_docs_tab( '#welcome', __( 'Welcome to Buildr', 'buildr' ) ); ?>

                <?php buildr_docs_tab( '#setup', __( 'Quick-Start Guide', 'buildr' ), array(
                    '#choose-navbar'            => __( 'Navbar', 'buildr' ),
                    '#add-menu'                 => __( 'Menus', 'buildr' ),
                    '#setup-blog'               => __( 'Blog', 'buildr' ),
                    '#customize-header'         => __( 'Header', 'buildr' ),
                    '#page-templates'           => __( 'Page Templates', 'buildr' ),
                    '#theme-presets'            => __( 'Theme Presets', 'buildr' ),
                ) ); ?>

                <?php if ( !function_exists( '\buildr_pro\init' ) ) : ?>
                    <li>
                        <a href="<?php echo esc_url( admin_url( 'themes.php?page=buildr-theme-upgrade' ) ); ?>">
                            <?php _e( 'Buildr Pro', 'buildr' ) ?>
                        </a>
                    </li>
                <?php endif; ?>
                

                
            </ul>

        </div>

        <div id="buildr-docs-content">
            
            <?php if( !function_exists( 'buildr\init' ) ) : ?>
            <div id="buildr-features-notice">

                <h3>
                    <span class="fas fa-lightbulb icon-rotate"></span>
                    <?php esc_html_e( 'Buildr Features', 'buildr' ); ?>
                </h3>
                <p>
                    <?php esc_html_e( 'It seems that you have not yet installed the Buildr Features plugin. It is highly recommended to install the plugin. It includes 3 header styles, 3 blog styles, over 140 customization options, one-click install theme-presets and 6 advanced widgets, completely free!', 'buildr' ); ?>
                </p>

            </div>
            <?php endif; ?>

            <div id="welcome">
                <?php buildr_render_doc( 'welcome' ); ?>
            </div>

            <div id="setup">
                <?php buildr_render_doc( 'setup' ); ?>
            </div>

        </div>
        
    </div>
    
</div>