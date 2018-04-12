<div class="wrap designr-docs">
    
    <h2><?php _e( 'Designr Theme Guide & Documentation', 'designr' ); ?></h2>
    
    <div class="designr-docs-menu">
        
        <ul>
            
            <?php designr_docs_tab( '#welcome', __( 'Welcome', 'designr' ) ) ?>
            
            <?php designr_docs_tab( '#setup', __( 'Setup & Installation', 'designr' ), array(
                '#theme-setup'      => __( 'Theme Setup', 'designr' ),
                '#companion-plugin' => __( 'Companion Plugin', 'designr'),
            ) ); ?>
            
            <?php designr_docs_tab( '#features', __( 'Features', 'designr' ) ) ?>
            
            <?php designr_docs_tab( '#about', __( 'About', 'designr' ) ) ?>

            
        </ul>
        
        
    </div>
    
    <div class="designr-docs-content">
        
    </div>
    
    

    
    <?php 
    $query['autofocus[section]'] = 'title_tagline';
    $section_link = add_query_arg( $query, admin_url( 'customize.php' ) );
    ?><a href="<?php echo esc_url( $section_link ); ?>">Link to title section</a>
    
</div>