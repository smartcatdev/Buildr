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
                    <span class="date">September 24, 2010</span> | <span class="author">by smartcat</span>
                </div>

                <div class="excerpt">
                    <?php the_excerpt(); ?>
                </div>

            </div>

            <div class="footer-meta">

                <div class="meta-stats">

                    <span class="fas fa-comment"></span> 2
                    <span class="fas fa-eye"></span> 16

                </div>

                <div class="categories-bar">
                    <span>Music</span>
                </div>

            </div>

        </div>

    </div>

</div>