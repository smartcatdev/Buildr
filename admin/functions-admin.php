<?php
/**
 * 
 * Functions available for the designr admin menu
 * 
 */

add_action( 'admin_enqueue_scripts', 'designr_load_admin_css' );


function designr_load_admin_css( $hook ) {
    
    if( 'appearance_page_designr-theme-info' == $hook ) {
        wp_enqueue_style( 'designr-admin-css', get_template_directory_uri() . '/assets/admin/css/docs.css' );
    }
    
}

function designr_docs_tab( $jump_link, $label, $children = null ) { ?>
    
<li>
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=designr-theme-info' . $jump_link ) ); ?>">
        <?php echo esc_html( $label ); ?>
    </a>
    
    <?php if( is_array( $children ) ) : ?>
        
    <ul class="child-nav">
        
        <?php foreach( $children as $child_link => $child_label ) : ?>

        <li>
            <a href="<?php echo esc_url( admin_url( 'themes.php?page=designr-theme-info' . $child_link ) ); ?>">
                <?php echo esc_html( $child_label ); ?>
            </a>

        </li>            
            
        <?php endforeach; ?>
    
    </ul>
        
    <?php endif; ?>
    
</li>


<?php }

function designr_docs_partial( $file ) {
    return trailingslashit( get_template_directory() ) . 'admin/doc-partials/' . $file . '.php';
}

function designr_render_doc( $filename ) {
    
    if( file_exists( designr_docs_partial( $filename ) ) ) {
        require designr_docs_partial( $filename );
    }
    
}