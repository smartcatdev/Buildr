<section class="sub-section">

    <h3 id="setup-blog" class="sub-heading">
        <?php _e( 'Setting Up Your Blog', 'designr' ); ?>
    </h3>
    
    <p>
        <?php _e( 'Describe the 3 styles of Blog layout and summarize the settings that can be used to customize their appearance and the content displayed in each post.', 'designr' ); ?>
        <?php _e( 'The three Blog layout styles are: "Standard", "Masonry - Cards", and "Mosaic - Grid".', 'designr' ); ?>
    </p>
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_blog_general';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php _e( 'Standard', 'designr' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php _e( 'This is the default Blog layout style that is set when you first install Designr. It features a single-column stack of posts that users can scroll down through. It also features a toggle that lets you choose from a simple flat appearance for the posts, or a raised 3D card style with a shadow.', 'designr' ); ?>
            </p>

            <img alt="<?php _e( 'Blog: Standard', 'designr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/blog/blog_default.jpg' ); ?>">
            
            <span class="options-heading">
                <?php _e( 'Options:', 'designr' ); ?>
            </span>
            <ul class="options-list">
                <li><?php _e( 'Show / Hide: Date, Author, Content, Category, Comment Count', 'designr' ); ?></li>
                <li><?php _e( 'Auto Excerpt - Trim Words Count', 'designr' ); ?></li>
                <li><?php _e( 'Auto Excerpt - "Read More" Text', 'designr' ); ?></li>
                <li><?php _e( 'Blog Card - Appearance', 'designr' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php _e( 'Blog Card - Rounded Corners Amount', 'designr' ); ?></li>
                <li><?php _e( 'Post Title - Font Size (Desktop & Mobile)', 'designr' ); ?></li>
                <li><?php _e( 'Post Date & Author - Font Size (Desktop & Mobile)', 'designr' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php _e( 'Show in Customizer', 'designr' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_blog_general';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php _e( 'Masonry - Cards', 'designr' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php _e( 'The "Masonry - Cards" layout displays your posts as cards that arrange themselves into a dynamic Masonry grid. The cards accommodate featured images of any size and the layout will automatically rearrange itself to maximize space when if the browser window changes size.', 'designr' ); ?>
            </p>

            <img alt="<?php _e( 'Blog: Masonry - Cards', 'designr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/blog/blog_masonry.jpg' ); ?>">
            
            <span class="options-heading">
                <?php _e( 'Options:', 'designr' ); ?>
            </span>
            <ul class="options-list">
                <li><?php _e( 'Show / Hide: Date, Author, Content, Category, Comment Count', 'designr' ); ?></li>
                <li><?php _e( 'Auto Excerpt - Trim Words Count', 'designr' ); ?></li>
                <li><?php _e( 'Auto Excerpt - "Read More" Text', 'designr' ); ?></li>
                <li><?php _e( 'Layout - Max Number of Columns', 'designr' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php _e( 'Blog Card - Rounded Corners Amount', 'designr' ); ?></li>
                <li><?php _e( 'Post Title - Font Size (Desktop & Mobile)', 'designr' ); ?></li>
                <li><?php _e( 'Post Date & Author - Font Size (Desktop & Mobile)', 'designr' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php _e( 'Show in Customizer', 'designr' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_blog_general';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php _e( 'Mosaic - Grid', 'designr' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php _e( 'The "Mosaic - Grid" layout puts the featured images of your posts front and center. The layout repeats after a set number of posts, which creates a mosaic-style grid. You can set the excerpt length to a shorter value or modify the title font size to increase or reduce the height of the rows in the mosaic.', 'designr' ); ?>
            </p>

            <img alt="<?php _e( 'Blog: Mosaic - Grid', 'designr' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/blog/blog_grid.jpg' ); ?>">
            
            <span class="options-heading">
                <?php _e( 'Options:', 'designr' ); ?>
            </span>
            <ul class="options-list">
                <li><?php _e( 'Show / Hide: Date, Author, Content, Category, Comment Count', 'designr' ); ?></li>
                <li><?php _e( 'Auto Excerpt - Trim Words Count', 'designr' ); ?></li>
                <li><?php _e( 'Auto Excerpt - "Read More" Text', 'designr' ); ?></li>
                <li><?php _e( 'Blog Card - Rounded Corners Amount', 'designr' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php _e( 'Spacing Between Mosaic Tiles', 'designr' ); ?></li>
                <li><?php _e( 'Post Title - Font Size (Desktop & Mobile)', 'designr' ); ?></li>
                <li><?php _e( 'Post Date & Author - Font Size (Desktop & Mobile)', 'designr' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php _e( 'Show in Customizer', 'designr' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
    
</section>