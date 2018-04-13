<?php
/**
 * 
 * Functions available for the designr admin menu
 * 
 */

add_action( 'admin_enqueue_scripts', 'designr_load_admin_css' );


function designr_load_admin_css( $hook ) {
    
    if( 'appearance_page_designr-theme-info' == $hook ) {
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/fontawesome-all.min.css' );
        wp_enqueue_style( 'designr-admin-css', get_template_directory_uri() . '/assets/admin/css/docs.css' );
    }
    
}

function designr_docs_partial( $file ) {
    return trailingslashit( get_template_directory() ) . 'admin/doc-partials/' . $file . '.php';
}

function designr_render_doc( $filename ) {
    
    if( file_exists( designr_docs_partial( $filename ) ) ) {
        require designr_docs_partial( $filename );
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

function designr_docs_subsection( $jump_id, $heading, $paragraphs ) { ?>

    <section class="sub-section">

        <h3 id="<?php echo esc_attr( $jump_id ); ?>" class="sub-heading">
            <?php echo esc_html( $heading ); ?>
        </h3>
        
        <?php if ( is_array( $paragraphs ) ) : ?>
            <?php foreach ( $paragraphs as $paragraph ) : ?>
                <p>
                    <?php echo esc_html( $paragraph ); ?>
                </p>
            <?php endforeach; ?>
        <?php else : ?>
            <p>
                <?php echo esc_html( $paragraphs ); ?>
            </p>
        <?php endif; ?>

    </section>

<?php 
}

function designr_docs_quickstart_cta( $jump_link, $font_icon, $label ) { ?>

    <div class="quickstart-cta">

        <a href="<?php echo esc_url( admin_url( 'themes.php?page=designr-theme-info#' . $jump_link ) ); ?>">

            <span class="fas <?php echo esc_attr( $font_icon ); ?>"></span>

            <h5 class="quickstart-label">
                <?php echo esc_html( $label ); ?>
            </h5>

        </a>

    </div>

<?php 
}