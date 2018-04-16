<div class="wrap" id="buildr-docs">
    
    <h2>
        <?php _e( 'Buildr Theme Guide & Documentation', 'buildr' ); ?>
    </h2>
    
    <div id="buildr-features-notice">
        
        bah blah blah
        
    </div>
    
    <div id="buildr-flex-wrap">
    
        <div id="buildr-docs-menu">
            
            <ul class="parent-nav">

                <?php buildr_docs_tab( '#welcome', __( 'Welcome to Buildr', 'buildr' ) 
//                        array(
//                    '#get-buildr-features'         => __( 'Get Buildr Features', 'buildr' ),
//                    '#choose-navbar'                => __( 'Choose Your Navbar Style', 'buildr'),
//                    '#add-menus'                    => __( 'Add a Menu', 'buildr'),
//                    '#setup-blog'                   => __( 'Setting Up Your Blog', 'buildr'),
//                        ) 
                ); ?>

                <?php buildr_docs_tab( '#setup', __( 'Setup & Installation', 'buildr' ), array(
                    '#theme-setup'                  => __( 'Theme Setup', 'buildr' ),
                    '#companion-plugin'             => __( 'Companion Plugin', 'buildr'),
                ) ); ?>

                <?php buildr_docs_tab( '#features', __( 'Features', 'buildr' ) ); ?>

                <?php buildr_docs_tab( '#about', __( 'About', 'buildr' ) ); ?>

            </ul>

        </div>

        <div id="buildr-docs-content">

            <div id="welcome">
                <?php buildr_render_doc( 'welcome' ); ?>
            </div>

            <div id="setup">
                <?php buildr_render_doc( 'setup' ); ?>
            </div>

        </div>
        
    </div>
    
</div>