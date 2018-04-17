<section class="sub-section">

    <h3 id="choose-navbar" class="sub-heading">
        <?php _e( 'Navbar', 'buildr' ); ?>
    </h3>
    
    <p>
        <?php _e( 'One of the first things you\'ll want to do when building your site with Buildr is to decide which of the Navbars you want to use. The Navbar appears at the top of every page of your website, and contains your site\'s branding and navigation menus.', 'buildr' ); ?>
        <?php _e( 'The three Navbar styles are: "Slim - Centered & Split", "Slim - Left Aligned", and "Banner".', 'buildr' ); ?>
    </p>
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_nav_style_a';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php _e( 'Slim - Left Aligned', 'buildr' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php _e( 'This is the default Navbar style that is set when you first install Buildr. It aligns the branding (logo or site title & tagline) and menu to the left side, and if social media links are available it will display them along the right side. It has a single Menu Location ("Navbar: Slim - Primary").', 'buildr' ); ?>
            </p>

            <img alt="<?php _e( 'Navbar: Slim - Left Aligned', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/navbars/navbar_slim_left.jpg' ); ?>">
            
            <span class="options-heading">
                <?php _e( 'Options:', 'buildr' ); ?>
            </span>
            <ul class="options-list">
                <li><?php _e( 'Links - Font Family', 'buildr' ); ?></li>
                <li><?php _e( 'Links - Font Size', 'buildr' ); ?></li>
                <li><?php _e( 'Links - Spacing', 'buildr' ); ?></li>
                <li><?php _e( 'Social Links Toggle', 'buildr' ); ?></li>
                <li><?php _e( 'Navbar Shadow Toggle', 'buildr' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php _e( 'Navbar Height (Initial & Sticky)', 'buildr' ); ?></li>
                <li><?php _e( 'Right Align Menu Toggle', 'buildr' ); ?></li>
                <li><?php _e( 'Boxed Content Toggle', 'buildr' ); ?></li>
                <li><?php _e( 'Final Link as Button Toggle', 'buildr' ); ?></li>
                <li><?php _e( 'Color Settings (Foreground & Background)', 'buildr' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php _e( 'Show in Customizer', 'buildr' ); ?> <span class="fas fa-chevron-right"></span></a>
            
            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php _e( 'Pro-Tip', 'buildr' ); ?></span>
                    <?php _e( 'Both "Slim" Navbar styles have two height values that can be set, "Initial" and "Sticky". The initial height transitions to the sticky height when the user scrolls down the page and the Navbar becomes stuck to the top of the browser. By using different values you can cause the Navbar to expand or become more compact as it becomes stuck.', 'buildr' ); ?>
                </p>
            </div>
            
        </div>
        
    </div>
    
    <div class="nested-subsection">
        
        <h4>
            <?php _e( 'Slim - Centered & Split', 'buildr' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php _e( 'This Navbar style is similar to the "Slim - Left Aligned" style, but the primary difference is that this style centers the branding in the middle of the Navbar, and features two different Menu Locations ("Navbar: Split - Left" & "Navbar: Split - Right"), which appear on opposite sides of the branding. It also displays the social link section differently - the icons appear within a drawer that slides open by clicking on a plus sign button on the right side of the Navbar.', 'buildr' ); ?>
            </p>

            <img alt="<?php _e( 'Navbar: Slim - Centered & Split', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/navbars/navbar_slim_split.jpg' ); ?>">
            
            <span class="options-heading">
                <?php _e( 'Options:', 'buildr' ); ?>
            </span>
            <ul class="options-list">
                <li><?php _e( 'Links - Font Family', 'buildr' ); ?></li>
                <li><?php _e( 'Links - Font Size', 'buildr' ); ?></li>
                <li><?php _e( 'Links - Spacing', 'buildr' ); ?></li>
                <li><?php _e( 'Social Links Toggle', 'buildr' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php _e( 'Navbar Shadow Toggle', 'buildr' ); ?></li>
                <li><?php _e( 'Navbar Height (Initial & Sticky)', 'buildr' ); ?></li>
                <li><?php _e( 'Final Link as Button Toggle', 'buildr' ); ?></li>
                <li><?php _e( 'Color Settings (Foreground & Background)', 'buildr' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php _e( 'Show in Customizer', 'buildr' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
    
    <div class="nested-subsection">
        
        <h4>
            <?php _e( 'Banner', 'buildr' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php _e( 'The "Banner" Navbar style features more of an expanded, stacked Navbar layout than its "Slim" siblings. It comes with controls for horizontally aligning both the menu and the branding (independently). It has a single Menu Location ("Navbar: Banner - Primary"), which appears below the branding. There are settings to fine-tune the space above and below the branding (for both Desktop and Mobile).', 'buildr' ); ?>
            </p>

            <img alt="<?php _e( 'Navbar: Banner', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/navbars/navbar_banner.jpg' ); ?>">
            
            <span class="options-heading">
                <?php _e( 'Options:', 'buildr' ); ?>
            </span>
            <ul class="options-list">
                <li><?php _e( 'Links - Font Family', 'buildr' ); ?></li>
                <li><?php _e( 'Links - Font Size', 'buildr' ); ?></li>
                <li><?php _e( 'Links - Spacing', 'buildr' ); ?></li>
                <li><?php _e( 'Navbar Shadow Toggle', 'buildr' ); ?></li>
                <li><?php _e( 'Transparent Menu Toggle', 'buildr' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php _e( 'Final Link as Button Toggle', 'buildr' ); ?></li>
                <li><?php _e( 'Branding Alignment', 'buildr' ); ?></li>
                <li><?php _e( 'Menu Alignment', 'buildr' ); ?></li>
                <li><?php _e( 'Spacing Above & Below Branding (Desktop & Mobile)', 'buildr' ); ?></li>
                <li><?php _e( 'Color Settings (Foreground & Background)', 'buildr' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php _e( 'Show in Customizer', 'buildr' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
        
</section>