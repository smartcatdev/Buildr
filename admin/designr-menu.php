<div class="wrap" id="designr-docs">
    
    <h2><?php _e( 'Designr Theme Guide & Documentation', 'designr' ); ?></h2>
    
    <div id="designr-docs-menu">
        
        <ul class="parent-nav">
            
            <?php designr_docs_tab( '#welcome', __( 'Welcome', 'designr' ) ) ?>
            
            <?php designr_docs_tab( '#setup', __( 'Setup & Installation', 'designr' ), array(
                '#theme-setup'      => __( 'Theme Setup', 'designr' ),
                '#companion-plugin' => __( 'Companion Plugin', 'designr'),
            ) ); ?>
            
            <?php designr_docs_tab( '#features', __( 'Features', 'designr' ) ) ?>
            
            <?php designr_docs_tab( '#about', __( 'About', 'designr' ) ) ?>

            
        </ul>
        
        
    </div>
    
    <div id="designr-docs-content">
        
        <div id="welcome">
            <?php require designr_docs_partial( 'welcome' ); ?>
        </div>
        
        
    </div>
    
    

    

    
</div>