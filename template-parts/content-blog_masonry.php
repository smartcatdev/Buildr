<div class="blog_item_wrap wow fadeInUp">

    <div class="blog_item">

        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="<?php the_title(); ?>">
            </a>
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

            <?php if ( ( get_theme_mod( 'blog_layout_show_comment_count', 'yes' ) == 'yes' || get_theme_mod( 'blog_layout_show_view_count', 'yes' ) == 'yes' ) || get_theme_mod( 'blog_layout_show_categories', 'yes' ) == 'yes' ) : ?>
            
                <div class="footer-meta">

                    <?php if ( get_theme_mod( 'blog_layout_show_comment_count', 'yes' ) == 'yes' || get_theme_mod( 'blog_layout_show_view_count', 'yes' ) == 'yes' ) : ?>

                        <div class="meta-stats">

                            <?php if ( get_theme_mod( 'blog_layout_show_comment_count', 'yes' ) == 'yes' ) : ?> 
                                <?php $comment_count = wp_count_comments( get_the_ID() ); ?>
                                <span class="fas fa-comment"></span> <?php echo esc_attr_e( $comment_count->approved ); ?>
                            <?php endif; ?>
                            
                            <?php if ( get_theme_mod( 'blog_layout_show_view_count', 'yes' ) == 'yes' ) : ?>
                                <span class="fas fa-eye"></span> 10
                            <?php endif; ?>

                        </div>

                    <?php endif; ?>

                    <?php $categories = get_the_category(); ?>
                    <?php if ( get_theme_mod( 'blog_layout_show_categories', 'yes' ) == 'yes' && !empty( $categories ) && is_array( $categories ) ) : ?> 
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

</div>