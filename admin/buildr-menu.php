<div class="wrap" id="designr-docs">
    
    <h2>
        <?php _e( 'Buildr Theme Guide & Documentation', 'buildr' ); ?>
    </h2>
    
    <div id="designr-features-notice">
        
        bah blah blah
        
    </div>
    
    <div id="designr-flex-wrap">
    
        <div id="designr-docs-menu">
            
            <ul class="parent-nav">

                <?php designr_docs_tab( '#welcome', __( 'Welcome to Buildr', 'buildr' ) 
//                        array(
//                    '#get-designr-features'         => __( 'Get Buildr Features', 'buildr' ),
//                    '#choose-navbar'                => __( 'Choose Your Navbar Style', 'buildr'),
//                    '#add-menus'                    => __( 'Add a Menu', 'buildr'),
//                    '#setup-blog'                   => __( 'Setting Up Your Blog', 'buildr'),
//                        ) 
                ); ?>

                <?php designr_docs_tab( '#setup', __( 'Setup & Installation', 'buildr' ), array(
                    '#theme-setup'                  => __( 'Theme Setup', 'buildr' ),
                    '#companion-plugin'             => __( 'Companion Plugin', 'buildr'),
                ) ); ?>

                <?php designr_docs_tab( '#features', __( 'Features', 'buildr' ) ); ?>

                <?php designr_docs_tab( '#about', __( 'About', 'buildr' ) ); ?>

            </ul>

        </div>

        <div id="designr-docs-content">

            <div id="welcome">
                <?php designr_render_doc( 'welcome' ); ?>
            </div>

            <div id="setup">
                <?php designr_render_doc( 'setup' ); ?>
            </div>

        </div>
        
    </div>
    
</div>