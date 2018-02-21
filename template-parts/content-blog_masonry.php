<div class="blog_item_wrap wow slideInUp">

    <div class="blog_item">

        <?php if ( has_post_thumbnail() ) : ?>
            
            <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="<?php the_title(); ?>">
            
        <?php endif; ?>
            
        <div class="inner-wrap">

            <div class="inner">

                <h2 class="entry-title">
                    <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <div class="blog-meta">
                    
                    <?php if ( get_theme_mod( 'blog_layout_show_date_posted', 'yes' ) == 'yes' || get_theme_mod( 'blog_layout_show_author', 'yes' ) == 'yes' ) : ?>
                    
                        <?php if ( get_theme_mod( 'blog_layout_show_date_posted', 'yes' ) == 'yes' ) : ?>    
                            <span class="post-date">
                                <?php esc_html_e( get_the_date( get_option( 'date_format' ) ) ); ?>
                            </span>
                        <?php endif; ?>
                    
                        <?php echo get_theme_mod( 'blog_layout_show_date_posted', 'yes' ) == 'yes' && get_theme_mod( 'blog_layout_show_author', 'yes' ) == 'yes' ? ' | ' : ''; ?>
                    
                        <?php if ( get_theme_mod( 'blog_layout_show_author', 'yes' ) == 'yes' ) : ?>    
                            <span class="post-author">
                                <?php _e( 'by', 'designr' ); ?> <?php the_author_posts_link(); ?>
                            </span>
                        <?php endif; ?>
                            
                    <?php endif; ?>
                    
                </div>

                <div class="excerpt">
                    <?php the_excerpt(); ?>
                </div>

            </div>

            <div class="footer-meta">

                <div class="meta-stats">

                    <?php $comment_count = wp_count_comments( get_the_ID() ); ?>
                    
                    <span class="fas fa-comment"></span> <?php echo esc_attr_e( $comment_count->approved ); ?>
                    <span class="fas fa-eye"></span> 10

                </div>

                <div class="categories-bar">
                    <span>Music</span>
                </div>

            </div>

        </div>

    </div>

</div>