<div class="wrap" id="designr-docs">
    
    <h2>
        <?php _e( 'Designr Theme Guide & Documentation', 'designr' ); ?>
    </h2>
    
    <div id="designr-features-notice">
        
        bah blah blah
        
    </div>
    
    <div id="designr-flex-wrap">
    
        <div id="designr-docs-menu">
            
            <ul class="parent-nav">

                <?php designr_docs_tab( '#welcome', __( 'Welcome to Designr', 'designr' ) 
//                        array(
//                    '#get-designr-features'         => __( 'Get Designr Features', 'designr' ),
//                    '#choose-navbar'                => __( 'Choose Your Navbar Style', 'designr'),
//                    '#add-menus'                    => __( 'Add a Menu', 'designr'),
//                    '#setup-blog'                   => __( 'Setting Up Your Blog', 'designr'),
//                        ) 
                ); ?>

                <?php designr_docs_tab( '#setup', __( 'Setup & Installation', 'designr' ), array(
                    '#theme-setup'                  => __( 'Theme Setup', 'designr' ),
                    '#companion-plugin'             => __( 'Companion Plugin', 'designr'),
                ) ); ?>

                <?php designr_docs_tab( '#features', __( 'Features', 'designr' ) ); ?>

                <?php designr_docs_tab( '#about', __( 'About', 'designr' ) ); ?>

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