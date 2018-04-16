<h2 class="section-heading">
    <?php _e( 'Welcome', 'buildr' ); ?>
</h2>

<?php 

$section_vars = array(
    
    'default' => array(
        'id'        => 'default',
        'title'     => __( 'Default Quickstart Item', 'buildr' ),
    ),
    
    'get-designr' => array(
        'id'        => 'get-designr',
        'title'     => __( 'Buildr Features', 'buildr' ),
    ),
    'choose-navbar' => array(
        'id'        => 'choose-navbar',
        'title'     => __( 'Choose Your Navbar Style', 'buildr' ),
    ),
    'add-menu' => array(
        'id'        => 'add-menu',
        'title'     => __( 'Add Your Menus', 'buildr' ),
    ),
    'setup-blog' => array(
        'id'        => 'setup-blog',
        'title'     => __( 'Setting Up Your Blog', 'buildr' ),
    ),
    'customize-header' => array(
        'id'        => 'customize-header',
        'title'     => __( 'Set up Your Custom Header', 'buildr' ),
    ),
    'page-builder' => array(
        'id'        => 'page-builder',
        'title'     => __( 'Drag & Drop Page Builder', 'buildr' ),
    ),
    'page-templates' => array(
        'id'        => 'page-templates',
        'title'     => __( 'Page Templates', 'buildr' ),
    ),
    'theme-presets' => array(
        'id'        => 'theme-presets',
        'title'     => __( 'Theme Presets', 'buildr' ),
    ),
    
);

?>

<?php designr_docs_quickstart_cta( $section_vars['get-designr']['id'], 'fa-star', $section_vars['get-designr']['title'] ); ?>
<?php designr_docs_quickstart_cta( $section_vars['choose-navbar']['id'], 'fa-list-alt', $section_vars['choose-navbar']['title'] ); ?>
<?php designr_docs_quickstart_cta( $section_vars['add-menu']['id'], 'fa-list', $section_vars['add-menu']['title'] ); ?>
<div class="clear"></div>
<?php designr_docs_quickstart_cta( $section_vars['setup-blog']['id'], 'fa-newspaper', $section_vars['setup-blog']['title'] ); ?>
<?php designr_docs_quickstart_cta( $section_vars['customize-header']['id'], 'fa-star', $section_vars['customize-header']['title'] ); ?>
<?php designr_docs_quickstart_cta( $section_vars['page-builder']['id'], 'fa-star', $section_vars['page-builder']['title'] ); ?>
<div class="clear"></div>
<?php designr_docs_quickstart_cta( $section_vars['page-templates']['id'], 'fa-file', $section_vars['page-templates']['title'] ); ?>
<?php designr_docs_quickstart_cta( $section_vars['theme-presets']['id'], 'fa-file', $section_vars['theme-presets']['title'] ); ?>

<div class="clear"></div>

<hr>

<?php designr_docs_subsection( $section_vars['get-designr']['id'], $section_vars['get-designr']['title'], array(
    __( 'Describe the additional benefits of installing the free Buildr Features plugin, why every Buildr user should download it, and where and how to do so.', 'buildr' ),
) ); ?>

<?php designr_render_doc( 'navbar' ); ?>

<?php designr_render_doc( 'menus' ); ?>

<?php designr_render_doc( 'blog' ); ?>

<?php designr_render_doc( 'custom_header' ); ?>

<?php designr_render_doc( 'page_builder' ); ?>

<?php designr_render_doc( 'page_templates' ); ?>

<?php designr_render_doc( 'theme_presets' ); ?>

<?php 
$query['autofocus[section]'] = 'title_tagline';
$section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
<a href="<?php echo esc_url( $section_link ); ?>">Link to title section</a>