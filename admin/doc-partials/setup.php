<h2 class="section-heading">
    <?php esc_html_e( 'Quick-Start Guide', 'buildr' ); ?>
</h2>

<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=buildr-theme-info#choose-navbar' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Select a Navbar', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/buildr_qs_navbar.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=buildr-theme-info#add-menu' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Adding Your Menus', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/buildr_qs_menus.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=buildr-theme-info#setup-blog' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Select a Blog Layout', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/buildr_qs_blog.jpg' ); ?>">
    </a>
</div>

<div class="clear"></div>

<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=buildr-theme-info#customize-header' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Setting Up Your Header', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/buildr_qs_header.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=buildr-theme-info#page-templates' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Using Page Templates', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/buildr_qs_templates.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=buildr-theme-info#theme-presets' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Using Theme Presets', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/buildr_qs_presets.jpg' ); ?>">
    </a>
</div>

<div class="clear"></div>

<?php buildr_render_doc( 'navbar' ); ?>

<?php buildr_render_doc( 'menus' ); ?>

<?php buildr_render_doc( 'blog' ); ?>

<?php buildr_render_doc( 'custom_header' ); ?>

<?php buildr_render_doc( 'page_templates' ); ?>

<?php buildr_render_doc( 'theme_presets' ); ?>