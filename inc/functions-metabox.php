<?php

new Buildr_Left_Right_Sidebar_Meta_Box;
class Buildr_Left_Right_Sidebar_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',        array ( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php',    array ( $this, 'init_metabox' ) );
        }
        
    }

    public function init_metabox() {

        add_action( 'add_meta_boxes',           array ( $this, 'add_metabox' ) );
        add_action( 'save_post',                array ( $this, 'save_metabox' ), 10, 2 );
        
    }

    public function add_metabox() {

        add_meta_box( 'buildr_left_right_sidebar_meta', __( 'Sidebar Options', 'buildr' ), array ( $this, 'render_left_right_sidebar_metabox' ), array( 'post', 'page' ), 'normal', 'high' );
        
    }

    public function render_left_right_sidebar_metabox( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( 'left_right_sidebar_meta_box_nonce_action', 'left_right_sidebar_meta_box_nonce' );

        // Retrieve an existing value from the database.
        $sidebar_template       = get_post_meta( $post->ID, BUILDR_META::SIDEBAR_TEMPLATE, true );
        $sidebar_location       = get_post_meta( $post->ID, BUILDR_META::SIDEBAR_LOCATION, true );
        
        // Set default values.
        if ( empty( $sidebar_template ) )       { $sidebar_template = 'none'; } 
        if ( empty( $sidebar_location ) )       { $sidebar_location = 'sidebar-right'; }
            
        // Form fields.
        echo '<table class="form-table">';

        echo '	<tr>';
        echo '		<th><label for="' . esc_attr( BUILDR_META::SIDEBAR_TEMPLATE ) . '" class="' . esc_attr( BUILDR_META::SIDEBAR_TEMPLATE ) . '_label">' . __( 'Sidebar - Template', 'buildr' ) . '</label></th>';
        echo '		<td>';
        echo '			<select id="' . esc_attr( BUILDR_META::SIDEBAR_TEMPLATE ) . '" name="' . esc_attr( BUILDR_META::SIDEBAR_TEMPLATE ) . '" class="' . esc_attr( BUILDR_META::SIDEBAR_TEMPLATE ) . '_field">'; 
        echo '                      <option value="none" ' . selected( $sidebar_template, 'none', false ) . ' >'  . __( 'None', 'buildr' ) . '</option>';
        echo '                      <option value="sidebar-side-a" ' . selected( $sidebar_template, 'sidebar-side-a', false ) . ' >'  . __( 'Sidebar A', 'buildr' ) . '</option>';
        echo '                      <option value="sidebar-side-b" ' . selected( $sidebar_template, 'sidebar-side-b', false ) . ' >'  . __( 'Sidebar B', 'buildr' ) . '</option>';
        echo '                      <option value="sidebar-side-c" ' . selected( $sidebar_template, 'sidebar-side-c', false ) . ' >'  . __( 'Sidebar C', 'buildr' ) . '</option>';
        echo '			</select>';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="' . esc_attr( BUILDR_META::SIDEBAR_LOCATION ) . '" class="' . esc_attr( BUILDR_META::SIDEBAR_LOCATION ) . '_label">' . __( 'Sidebar - Location', 'buildr' ) . '</label></th>';
        echo '		<td>';
        echo '			<select id="' . esc_attr( BUILDR_META::SIDEBAR_LOCATION ) . '" name="' . esc_attr( BUILDR_META::SIDEBAR_LOCATION ) . '" class="' . esc_attr( BUILDR_META::SIDEBAR_LOCATION ) . '_field">'; 
        echo '                      <option value="sidebar-left" '  . selected( $sidebar_location, 'sidebar-left', false ) . ' >'  . __( 'Left', 'buildr' ) . '</option>';
        echo '                      <option value="sidebar-right" ' . selected( $sidebar_location, 'sidebar-right', false ) . ' >'  . __( 'Right', 'buildr' ) . '</option>';
        echo '			</select>';
        echo '		</td>';
        echo '	</tr>';

        echo '</table>';
        
    }
    
    public function save_metabox( $post_id, $post ) {

        // Add nonce for security and authentication.
        $nonce_name     = isset( $_POST[ 'left_right_sidebar_meta_box_nonce' ] ) ? $_POST[ 'left_right_sidebar_meta_box_nonce' ] : '';
        $nonce_action   = 'left_right_sidebar_meta_box_nonce_action';

        // Check if a nonce is set and valid
        if ( !isset( $nonce_name ) ) { return; }
        if ( !wp_verify_nonce( $nonce_name, $nonce_action ) ) { return; }
            
        // Sanitize user input.
        $sidebar_template       = isset( $_POST[ BUILDR_META::SIDEBAR_TEMPLATE ] ) ? sanitize_text_field( $_POST[ BUILDR_META::SIDEBAR_TEMPLATE ] ) : '';
        $sidebar_location       = isset( $_POST[ BUILDR_META::SIDEBAR_LOCATION ] ) ? sanitize_text_field( $_POST[ BUILDR_META::SIDEBAR_LOCATION ] ) : '';

        // Update the meta field in the database.
        update_post_meta( $post_id, BUILDR_META::SIDEBAR_TEMPLATE, $sidebar_template );
        update_post_meta( $post_id, BUILDR_META::SIDEBAR_LOCATION, $sidebar_location );
        
    }
    
}