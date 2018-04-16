<section class="sub-section">

    <h3 id="customize-header" class="sub-heading">
        <?php _e( 'Set Up Your Custom Header', 'designr' ); ?>
    </h3>
    
    <p>
        <?php _e( 'Describe the ways you can customize the Custom Header, including the parallax styles, height settings, and content displayed within it.', 'designr' ); ?>
    </p>
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_custom_header_general';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php _e( 'Parallax Style: Vertical Scroll', 'designr' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php _e( 'You can choose to use this header Parallax Style by selecting it under Header > General Settings. The "Vertical Scroll" style is a traditional parallax effect, where the background image of the header will appear to move at a different rate from the content as the user scrolls down the page.', 'designr' ); ?>
            </p>

            <span class="options-heading">
                <?php _e( 'Options:', 'designr' ); ?>
            </span>
            <ul class="options-list">
                <li><?php _e( 'How to Calculate Height (Percentage or Pixels)', 'designr' ); ?></li>
                <li><?php _e( 'Height Settings (Desktop & Mobile)', 'designr' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php _e( 'Parallax Intensity', 'designr' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php _e( 'Show in Customizer', 'designr' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
        
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_custom_header_general';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php _e( 'Parallax Style: Perspective Layers', 'designr' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php _e( 'You can choose to use this header Parallax Style by selecting it under Header > General Settings. The "" style is a traditional parallax effect, where the background image of the header will appear to move at a different rate from the content as the user scrolls down the page.', 'designr' ); ?>
            </p>

            <span class="options-heading">
                <?php _e( 'Options:', 'designr' ); ?>
            </span>
            <ul class="options-list">
                <li><?php _e( 'How to Calculate Height (Percentage or Pixels)', 'designr' ); ?></li>
                <li><?php _e( 'Height Settings (Desktop & Mobile)', 'designr' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php _e( 'Parallax Intensity', 'designr' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php _e( 'Show in Customizer', 'designr' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
        
</section>