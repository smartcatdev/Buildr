<?php
/**
 * Template part for displaying single EDD products
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Buildr
 */
?>

<div id="buildr-edd-header">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <div id="edd-header-wrap-wrapper">
                        
                        <div id="edd-header-wrap-blurb">

                            <?php if ( get_post_meta( get_the_ID(), BUILDR_META::EDD_CATEGORY, true ) ) : ?>
                                
                                <span class="product-category">
                                    <?php echo esc_html( get_post_meta( get_the_ID(), BUILDR_META::EDD_CATEGORY, true ) ); ?>
                                </span>
                            
                            <?php endif; ?>
                            
                            <?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?>

                            <span class="small-divider dark"></span>
                            
                            <?php if ( function_exists( 'edd_price' ) ) : ?>
                            
                                <div class="price">
                                    <?php if ( edd_has_variable_prices( get_the_ID() ) ) :
                                        echo edd_price_range( get_the_ID() );
                                    else :
                                        edd_price( get_the_ID() );
                                    endif; ?>
                                </div>

                            <?php endif; ?>
                            
                            <?php the_excerpt(); ?>
                            
                            <div class="edd-buttons">
                            
                                <div class="product-buttons">
                                    <?php if ( ! edd_has_variable_prices( get_the_ID() ) ) : ?>
                                        <?php echo edd_get_purchase_link( get_the_ID(), 'Add to Cart', 'button' ); ?>
                                    <?php else : ?>
                                        <?php edd_append_purchase_link( get_the_ID() ); ?>
                                    <?php endif; ?>                                                
                                </div>

                            </div>

                        </div>

                        <div id="edd-header-wrap-gallery">

                            <div id="edd-gallery-wrap">
                                
                                <div class="edd-gallery-slide">
                                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID() ); ?>" alt="">    
                                </div>
                                <div class="edd-gallery-slide">
                                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID() ); ?>" alt="">
                                </div>
                                
                            </div> 
                            
                        </div>
                        
                    </div>

                </div>

            </div>

        </div>

    </article>

</div>
    
<div id="buildr-edd-body">
        
    <div class="container">
            
        <div class="row">
                
            <div class="col-sm-12">
                
                <ul class="nav nav-pills">
                    
                    <li class="active">
                        <a data-toggle="pill" href="#description">
                            <?php esc_html_e( 'Description', 'buildr' ); ?>
                        </a>
                    </li>
                    
                    <?php if ( get_post_meta( get_the_ID(), BUILDR_META::EDD_ADDITIONAL_INFO, true ) ) : ?>
                                
                        <li>
                            <a data-toggle="pill" href="#additional-info">
                                <?php esc_html_e( 'Additional Info', 'buildr' ); ?>
                            </a>
                        </li>

                    <?php endif; ?>
                        
                </ul>

                <div class="tab-content">
                    
                    <div id="description" class="tab-pane fade in active">
                        <div class="tab-inner">
                            <?php echo strip_tags( get_the_content() ); ?>
                        </div>
                    </div>
                    
                    <?php if ( get_post_meta( get_the_ID(), BUILDR_META::EDD_ADDITIONAL_INFO, true ) ) : ?>

                        <div id="additional-info" class="tab-pane fade">
                            <div class="tab-inner">
                                <?php echo esc_html( get_post_meta( get_the_ID(), BUILDR_META::EDD_ADDITIONAL_INFO, true ) ); ?>
                            </div>
                        </div>
                    
                    <?php endif; ?>
                    
                </div>

            </div>

        </div>
        
    </div>
                
</div>
            
            