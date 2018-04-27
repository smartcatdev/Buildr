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
                    
                    <?php if ( get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_DATE, BUILDR_DEFAULTS::BLOG_SHOW_DATE ) || get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_AUTHOR, BUILDR_DEFAULTS::BLOG_SHOW_AUTHOR ) ) : ?>
                    
                        <?php if ( get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_DATE, BUILDR_DEFAULTS::BLOG_SHOW_DATE ) ) : ?>    
                            <span class="post-date">
                                <?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ); ?>
                            </span>
                        <?php endif; ?>
                    
                        <?php echo get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_DATE, BUILDR_DEFAULTS::BLOG_SHOW_DATE ) && get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_AUTHOR, BUILDR_DEFAULTS::BLOG_SHOW_AUTHOR ) ? ' | ' : ''; ?>
                    
                        <?php if ( get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_AUTHOR, BUILDR_DEFAULTS::BLOG_SHOW_AUTHOR ) ) : ?>    
                            <span class="post-author">
                                <?php esc_html_e( 'by', 'buildr' ); ?> <?php the_author_posts_link(); ?>
                            </span>
                        <?php endif; ?>
                            
                    <?php endif; ?>
                    
                </div>

                <div class="excerpt">
                    <?php if ( get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_CONTENT, BUILDR_DEFAULTS::BLOG_SHOW_CONTENT ) ) : ?>
                        <?php the_excerpt(); ?>
                    <?php endif; ?>
                </div>

            </div>

            <?php if ( ( get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_COMMENT_COUNT, BUILDR_DEFAULTS::BLOG_SHOW_COMMENT_COUNT ) || get_theme_mod( 'blog_layout_show_view_count', false ) ) || get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_CATEGORY, BUILDR_DEFAULTS::BLOG_SHOW_CATEGORY ) ) : ?>
            
                <div class="footer-meta">

                    <?php if ( get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_COMMENT_COUNT, BUILDR_DEFAULTS::BLOG_SHOW_COMMENT_COUNT ) || get_theme_mod( 'blog_layout_show_view_count', false ) ) : ?>

                        <div class="meta-stats">

                            <?php if ( get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_COMMENT_COUNT, BUILDR_DEFAULTS::BLOG_SHOW_COMMENT_COUNT ) ) : ?> 
                                <?php $comment_count = wp_count_comments( get_the_ID() ); ?>
                                <span class="fas fa-comment"></span> <?php echo intval( $comment_count->approved ); ?>
                            <?php endif; ?>
                            
                            <?php do_action('buildr_get_blog_meta_view_counter'); ?>
                                
                        </div>

                    <?php endif; ?>

                    <?php $categories = get_the_category(); ?>
                    <?php if ( get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_CATEGORY, BUILDR_DEFAULTS::BLOG_SHOW_CATEGORY ) && !empty( $categories ) && is_array( $categories ) ) : ?> 
                        <div class="categories-bar">
                            <?php $ctr = 0; ?>
                            <?php foreach ( $categories as $cat ) : ?>
                                <?php $ctr++; ?>
                                <span>
                                    <a href="<?php echo esc_url( get_category_link( $cat ) ); ?>">
                                        <?php echo esc_html( $cat->name ); ?><?php echo $ctr != count( $categories ) ? ', ' : ''; ?>
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