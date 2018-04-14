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

<section class="sub-section">

    <h3 id="<?php echo esc_attr( $section_vars['choose-navbar']['id'] ); ?>" class="sub-heading">
        <?php echo esc_html( $section_vars['choose-navbar']['title'] ); ?>
    </h3>
    
    <p>
        <?php echo esc_html( __( 'One of the first things you\'ll want to do when building your site with Designr is to decide which of the Navbars you want to use. The Navbar appears at the top of every page of your website, and contains your site\'s branding and navigation menus.', 'designr' ) ); ?>
        <?php echo esc_html( __( 'The three Navbar styles are: "Slim - Centered & Split", "Slim - Left Aligned", and "Banner".', 'designr' ) ); ?>
    </p>
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_nav_style_a';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php echo esc_html( __( 'Slim - Left Aligned', 'designr' ) ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php echo esc_html( __( 'This is the default Navbar style that is set when you first install Designr. It aligns the branding (logo or site title & tagline) and menu to the left side, and if social media links are available it will display them along the right side. It has a single Menu Location ("Navbar: Slim - Primary")', 'designr' ) ); ?>
            </p>

            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( '"Initial" and "Sticky" Heights', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'When the scrollbar is at the very top of the page, the Initial height is used for the Slim Navbar. As you scroll down the page, the Slim Navbar becomes stuck to the top of the browser window, and smoothly transitions to the Sticky height value.', 'designr' ) ); ?>
                    <?php echo esc_html( __( 'By default, the Initial height is larger than the Sticky height, which gives the Navbar the effect of becoming more compact as the user scrolls down. You can reverse this effect, making the menu expand on scroll, by making the Initial height less than the Sticky height value.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>
            
            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( 'Right Aligning the Menu', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'If you prefer to have the menu on the right side of the Navbar (with branding and menu at opposite ends of container), toggle "Right Aligned Menu?" on. Please note that the social links section is not available in the Slim Left Navbar when this setting is on.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>

            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( 'Boxing the Navbar Content', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'If you would like for the inner contents of the Navbar to line up with the site\'s main content container (as opposed to the browser edges), toggle "Box the Content?" on.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>

            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( 'Converting the Last Menu Link to a Button', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'If you would like for the last (right-most) link in the Navbar menu to appear as a rounded, attention-drawing button, toggle "Style final Navbar link as a CTA?" on.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>
            
        </div>
        
    </div>
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_nav_style_a';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php echo esc_html( __( 'Slim - Centered & Split', 'designr' ) ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php echo esc_html( __( 'This Navbar style is similar to the "Slim - Left Aligned" style because it also features the "Initial" and "Sticky" heights. The primary difference is that this style centers the branding in the exact center of the Navbar, and features two different Menu Locations ("Navbar: Split - Left" & "Navbar: Split - Right"), which appear on either side of the branding. It also displays the social link section differently - the icons appear within a drawer that slides open by clicking on a plus sign button on the right side of the Navbar.', 'designr' ) ); ?>
            </p>

            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( '"Initial" and "Sticky" Heights', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'When the scrollbar is at the very top of the page, the Initial height is used for the Slim Navbar. As you scroll down the page, the Slim Navbar becomes stuck to the top of the browser window, and smoothly transitions to the Sticky height value.', 'designr' ) ); ?>
                    <?php echo esc_html( __( 'By default, the Initial height is larger than the Sticky height, which gives the Navbar the effect of becoming more compact as the user scrolls down. You can reverse this effect, making the menu expand on scroll, by making the Initial height less than the Sticky height value.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>
            
            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( 'Converting the Last Menu Link to a Button', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'If you would like for the last (right-most) link in the Navbar menu to appear as a rounded, attention-drawing button, toggle "Style final Navbar link as a CTA?" on.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>
            
        </div>
        
    </div>
        
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_nav_style_a';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php echo esc_html( __( 'Banner', 'designr' ) ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php echo esc_html( __( 'The "Banner" Navbar style features more of an expanded, stacked Navbar layout than its "Slim" siblings. It comes with controls for horizontally aligning both the menu and the branding (independently). It has a single Menu Location ("Navbar: Banner - Primary"), which appears below the branding. There are settings to fine-tune the space above and below the branding (for both Desktop and Mobile).', 'designr' ) ); ?>
            </p>
            
            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( 'Boxing the Navbar Content', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'If you would like for the inner contents of the Navbar to line up with the site\'s main content container (as opposed to the browser edges), toggle "Box the Content?" on.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>
            
            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( 'Making the Menu Background Transparent', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'In some cases, if you are using an image background for your Navbar, you may want a solid color behind your menu items for readability. While this setting defaults to being on (transparent background), toggling it off will let you set Menu Background & Foreground colors from the Navbar > Colors section of the Customizer.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>
            
            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( 'Aligning the Branding', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'Set how you want the branding to be aligned within the Navbar.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>
            
            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( 'Aligning the Menu', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'Set how you want the branding to be aligned within the Navbar.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>

            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( 'Setting the Space Above & Below the Branding', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'Depending on the size and shape of your logo or the site title, these settings will let you adjust the space above and below the branding, for both Desktop and Mobile devices.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>
            
            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php echo esc_html( __( 'Converting the Last Menu Link to a Button', 'designr' ) ); ?></span>
                    <?php echo esc_html( __( 'If you would like for the last (right-most) link in the Navbar menu to appear as a rounded, attention-drawing button, toggle "Style final Navbar link as a CTA?" on.', 'designr' ) ); ?>
                </p>
                <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><span class="fas fa-chevron-right"></span></a>
            </div>
            
        </div>
        
    </div>
        
</section>

<?php designr_docs_subsection( $section_vars['add-menu']['id'], $section_vars['add-menu']['title'], array(
    __( 'Describe the various places a menu can be set and which menu locations are used for each of the Navbar styles.', 'designr' ),
) ); ?>

<?php designr_docs_subsection( $section_vars['setup-blog']['id'], $section_vars['setup-blog']['title'], array(
    __( 'Describe the 3 styles of Blog layout and summarize the settings that can be used to customize their appearance and the content displayed in each post.', 'designr' ),
) ); ?>

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