<div class="edd-product">
    
    <div class="edd-product-inner">
        
        <div class="product-image">
            
            <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'product-image' ); ?>
                <?php else : ?>
                    <div class="edd-product-icon">
                        <span class="fa fa-download"></span>
                    </div>
                <?php endif; ?>
            </a>
                
        </div>
        
        <div class="product-details">

            <div class="product-heading">

                <h3 class="product-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>

                <div class="product-price">
                    <?php 
                    if ( edd_has_variable_prices( get_the_ID() ) ) :
                        echo edd_price_range( get_the_ID() );
                    else :
                        edd_price( get_the_ID() );
                    endif;
                    ?>
                </div>

            </div>

            <?php if ( has_excerpt() ) : ?>

                <hr>
            
                <div class="edd-excerpt">
                    <?php the_excerpt(); ?>
                </div>
                    
            <?php endif; ?>
            
            <div class="product-buttons">
                <div class="product-buttons-inner">
                    <?php if ( !edd_has_variable_prices( get_the_ID() ) ) : ?>
                        <?php echo edd_get_purchase_link( array(
                            'class' => 'button primary'
                        ) ); ?>
                    <?php endif; ?>
                    <a class="button <?php echo edd_has_variable_prices( get_the_ID() ) ? 'primary' : 'secondary'; ?>" href="<?php the_permalink(); ?>"><?php _e( 'Product details', 'buildr' ); ?></a>                                                
                </div>
            </div><!--end .product-buttons-->

        </div>
        
    </div>
    
</div><!--end .product-->