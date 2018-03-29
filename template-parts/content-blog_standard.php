<div class="blog_item_wrap wow fadeInUp">

    <div class="blog_item">

        <div class="meta-header">
            
            <div class="blog-meta">

                <?php if ( get_theme_mod( 'blog_layout_show_date_posted', true ) || get_theme_mod( 'blog_layout_show_author', true ) ) : ?>

                    <div class="posted-meta">
                
                        <?php if ( get_theme_mod( 'blog_layout_show_date_posted', true ) ) : ?>    
                            <span class="post-date">
                                <?php esc_html_e( get_the_date( get_option( 'date_format' ) ) ); ?>
                            </span>
                        <?php endif; ?>

                        <?php echo get_theme_mod( 'blog_layout_show_date_posted', true ) && get_theme_mod( 'blog_layout_show_author', true ) ? ' | ' : ''; ?>

                        <?php if ( get_theme_mod( 'blog_layout_show_author', true ) ) : ?>    
                            <span class="post-author">
                                <?php _e( 'by', 'designr' ); ?> <?php the_author_posts_link(); ?>
                            </span>
                        <?php endif; ?>
                        
                    </div>

                <?php endif; ?>
                
                <?php if ( get_theme_mod( 'blog_layout_show_categories', true ) ) : ?>
                
                    <div class="category-meta">

                        <?php $categories = get_the_category(); ?>
                        <?php if ( get_theme_mod( 'blog_layout_show_categories', true ) && !empty( $categories ) && is_array( $categories ) ) : ?> 
                            <div class="categories-bar">
                                <?php $ctr = 0; ?>
                                <?php foreach ( $categories as $cat ) : ?>
                                    <?php $ctr++; ?>
                                    <span>
                                        <a href="<?php echo esc_url( get_category_link( $cat ) ); ?>">
                                            <?php esc_attr_e( $cat->name ); ?><?php echo $ctr != count( $categories ) ? ', ' : ''; ?>
                                        </a>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    
                <?php endif; ?>
                
            </div>
            
        </div>
            
        <div class="inner-wrap">

            <div class="inner">

                <div class="excerpt">
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                            <img class="featured-image" src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="<?php the_title(); ?>">
                        </a>
                    <?php endif; ?>
                    
                    <h2 class="entry-title">
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    
                    <?php if ( get_theme_mod( 'blog_layout_show_content_excerpt', true ) ) : ?>
                        <?php the_excerpt(); ?>
                    <?php endif; ?>
                    
                </div>

                <?php if ( get_theme_mod( 'blog_layout_show_comment_count', true ) ) : ?>

                    <div class="stats-meta">

                        <?php if ( get_theme_mod( 'blog_layout_show_comment_count', true ) ) : ?> 
                            <?php $comment_count = wp_count_comments( get_the_ID() ); ?>
                            <span class="fas fa-comment"></span> <?php echo esc_attr_e( $comment_count->approved ); ?>
                        <?php endif; ?>

                        <?php do_action('designr_get_blog_meta_view_counter'); ?>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>

    </div>

    <div class="clear"></div>
    
</div>