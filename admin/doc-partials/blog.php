<section class="sub-section">

    <h3 id="setup-blog" class="sub-heading">
        <?php esc_html_e( 'Blog', 'buildr' ); ?>
    </h3>
    
    <p>
        <?php esc_html_e( 'Buildr includes 3 optional blog styles that you can choose from using the theme customizer.', 'buildr' ); ?>
        <?php esc_html_e( 'The three Blog layout styles are: "Standard", "Masonry - Cards", and "Mosaic - Grid".', 'buildr' ); ?>
    </p>
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_blog_general';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php esc_html_e( 'Standard', 'buildr' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php esc_html_e( 'This is the default Blog layout style that is set when you first install Buildr. It features a single-column stack of posts that users can scroll down through. It also features a toggle that lets you choose from a simple flat appearance for the posts, or a raised 3D card style with a shadow.', 'buildr' ); ?>
            </p>

            <img alt="<?php esc_attr_e( 'Blog: Standard', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/blog/blog_default.jpg' ); ?>">
            
            <span class="options-heading">
                <?php esc_html_e( 'Options:', 'buildr' ); ?>
            </span>
            <ul class="options-list">
                <li><?php esc_html_e( 'Show / Hide: Date, Author, Content, Category, Comment Count', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Auto Excerpt - Trim Words Count', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Auto Excerpt - "Read More" Text', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Blog Card - Appearance', 'buildr' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php esc_html_e( 'Blog Card - Rounded Corners Amount', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Post Title - Font Size (Desktop & Mobile)', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Post Date & Author - Font Size (Desktop & Mobile)', 'buildr' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php esc_html_e( 'Show in Customizer', 'buildr' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_blog_general';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php esc_html_e( 'Masonry - Cards', 'buildr' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php esc_html_e( 'The "Masonry - Cards" layout displays your posts as cards that arrange themselves into a dynamic Masonry grid. The cards accommodate featured images of any size and the layout will automatically rearrange itself to maximize space when if the browser window changes size.', 'buildr' ); ?>
            </p>

            <img alt="<?php esc_attr_e( 'Blog: Masonry - Cards', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/blog/blog_masonry.jpg' ); ?>">
            
            <span class="options-heading">
                <?php esc_html_e( 'Options:', 'buildr' ); ?>
            </span>
            <ul class="options-list">
                <li><?php esc_html_e( 'Show / Hide: Date, Author, Content, Category, Comment Count', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Auto Excerpt - Trim Words Count', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Auto Excerpt - "Read More" Text', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Layout - Max Number of Columns', 'buildr' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php esc_html_e( 'Blog Card - Rounded Corners Amount', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Post Title - Font Size (Desktop & Mobile)', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Post Date & Author - Font Size (Desktop & Mobile)', 'buildr' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php esc_html_e( 'Show in Customizer', 'buildr' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_blog_general';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php esc_html_e( 'Mosaic - Grid', 'buildr' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php esc_html_e( 'The "Mosaic - Grid" layout puts the featured images of your posts front and center. The layout repeats after a set number of posts, which creates a mosaic-style grid. You can set the excerpt length to a shorter value or modify the title font size to increase or reduce the height of the rows in the mosaic.', 'buildr' ); ?>
            </p>

            <img alt="<?php esc_attr_e( 'Blog: Mosaic - Grid', 'buildr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/blog/blog_grid.jpg' ); ?>">
            
            <span class="options-heading">
                <?php esc_html_e( 'Options:', 'buildr' ); ?>
            </span>
            <ul class="options-list">
                <li><?php esc_html_e( 'Show / Hide: Date, Author, Content, Category, Comment Count', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Auto Excerpt - Trim Words Count', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Auto Excerpt - "Read More" Text', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Blog Card - Rounded Corners Amount', 'buildr' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php esc_html_e( 'Spacing Between Mosaic Tiles', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Post Title - Font Size (Desktop & Mobile)', 'buildr' ); ?></li>
                <li><?php esc_html_e( 'Post Date & Author - Font Size (Desktop & Mobile)', 'buildr' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php esc_html_e( 'Show in Customizer', 'buildr' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
    
</section>