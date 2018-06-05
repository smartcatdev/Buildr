<?php
/**
 * Template part for displaying single EDD products
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Buildr
 */

$edd_gallery = get_post_meta( get_the_ID(), BUILDR_META::EDD_GALLERY, true );

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
                            
                                <?php $sale_price = get_post_meta( get_the_ID(), 'edd_sale_price', true ); ?>
                                
                                <div class="price <?php echo isset( $sale_price ) && !empty( $sale_price ) && ! edd_has_variable_prices( get_the_ID() ) ? 'on-sale' : ''; ?> ">
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
                                    
                                    <?php echo edd_get_purchase_link( array(
                                        'download_id'       => get_the_ID(),
                                        'price'             => false,
                                        'direct'            => false,
                                        'class'             => 'primary',
                                    ) ); ?>
                                    
                                    <?php if ( get_post_meta( get_the_ID(), BUILDR_META::EDD_SECOND_BUTTON_LABEL, true ) && get_post_meta( get_the_ID(), BUILDR_META::EDD_SECOND_BUTTON_URL, true ) ) : ?>
                                    
                                        <a class="button secondary" href="<?php echo esc_url( get_post_meta( get_the_ID(), BUILDR_META::EDD_SECOND_BUTTON_URL, true ) ); ?>" <?php echo get_post_meta( get_the_ID(), BUILDR_META::EDD_SECOND_BUTTON_TARGET, true ) != 'same' ? ' target="_BLANK" ' : ''; ?>>
                                            <?php echo esc_html( get_post_meta( get_the_ID(), BUILDR_META::EDD_SECOND_BUTTON_LABEL, true ) ); ?>
                                        </a>
                                    
                                    <?php endif; ?>
                                    
                                </div>
                                
                                <div class="clear"></div>

                            </div>
                            
                        </div>
                        
                        <?php if ( get_post_meta( get_the_ID(), BUILDR_META::EDD_VIDEO_ID, true ) ) : ?>
                        
                            <iframe class="edd-product-video" id="ytplayer" type="text/html" width="640" height="360"
                            src="https://www.youtube.com/embed/<?php echo esc_attr( get_post_meta( get_the_ID(), BUILDR_META::EDD_VIDEO_ID, true ) ); ?>?autoplay=<?php echo get_post_meta( get_the_ID(), BUILDR_META::EDD_VIDEO_AUTOPLAY, true ) == 'autoplay' ? 1 : 0; ?>"
                            frameborder="0"></iframe>
                        
                        <?php else : ?>

                            <?php buildr_output_edd_product_gallery( $edd_gallery ); ?>
                        
                        <?php endif; ?>
                        
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
                
                <ul id="edd-tab-nav" class="nav nav-pills">
                    
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
                            <?php echo get_the_content(); ?>
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
            
            