<h2 class="section-heading">
    <?php _e( 'Welcome', 'designr' ); ?>
</h2>

<?php 

$section_vars = array(
    
    'default' => array(
        'id'        => 'default',
        'title'     => __( 'Default Quickstart Item', 'designr' ),
    ),
    
    'get-designr' => array(
        'id'        => 'get-designr',
        'title'     => __( 'Designr Features', 'designr' ),
    ),
    'choose-navbar' => array(
        'id'        => 'choose-navbar',
        'title'     => __( 'Choose Your Navbar Style', 'designr' ),
    ),
    'add-menu' => array(
        'id'        => 'add-menu',
        'title'     => __( 'Add Your Menus', 'designr' ),
    ),
    'setup-blog' => array(
        'id'        => 'setup-blog',
        'title'     => __( 'Setting Up Your Blog', 'designr' ),
    ),
    'customize-header' => array(
        'id'        => 'customize-header',
        'title'     => __( 'Set up Your Custom Header', 'designr' ),
    ),
    'page-builder' => array(
        'id'        => 'page-builder',
        'title'     => __( 'Drag & Drop Page Builder', 'designr' ),
    ),
    'page-templates' => array(
        'id'        => 'page-templates',
        'title'     => __( 'Page Templates', 'designr' ),
    ),
    'theme-presets' => array(
        'id'        => 'theme-presets',
        'title'     => __( 'Theme Presets', 'designr' ),
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
    __( 'Describe the additional benefits of installing the free Designr Features plugin, why every Designr user should download it, and where and how to do so.', 'designr' ),
) ); ?>

<?php designr_render_doc( 'navbar' ); ?>

<?php designr_docs_subsection( $section_vars['add-menu']['id'], $section_vars['add-menu']['title'], array(
    __( 'Describe the various places a menu can be set and which menu locations are used for each of the Navbar styles.', 'designr' ),
) ); ?>

<?php designr_render_doc( 'blog' ); ?>

<?php designr_render_doc( 'custom_header' ); ?>

<?php designr_docs_subsection( $section_vars['customize-header']['id'], $section_vars['customize-header']['title'], array(
    __( 'Describe the ways you can customize the Custom Header, including the parallax styles, height settings, and content displayed within it.', 'designr' ),
) ); ?>

<?php designr_docs_subsection( $section_vars['page-builder']['id'], $section_vars['page-builder']['title'], array(
    __( 'Describe how easy it is to drag and drop widgets into any page or post to build complex and beautiful layouts. They can use the drag/drop page builder to design unique Frontpage, Posts, and Blog pages and also use the custom page templates to create unique content pages. At the end, mention the custom page templates and jumplink to the Page Templates docs section.', 'designr' ),
) ); ?>

<?php designr_docs_subsection( $section_vars['page-templates']['id'], $section_vars['page-templates']['title'], array(
    __( 'Describe the two types of Page Templates (Landing Pages with no content output and one sidebar area, and the regular Page Templates with content and above/below sidebars). Explain how there are 3 of each type (A,B,C) and list the sidebar areas that are available.', 'designr' ),
) ); ?>

<?php designr_docs_subsection( $section_vars['theme-presets']['id'], $section_vars['theme-presets']['title'], array(
    __( 'Describe what a theme preset is and how easy it is to start from one, then go into detail about where to find them and how to load one into your site.', 'designr' ),
) ); ?>

<?php 
$query['autofocus[section]'] = 'title_tagline';
$section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
<a href="<?php echo esc_url( $section_link ); ?>">Link to title section</a>