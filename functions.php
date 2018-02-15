<?php

require get_template_directory() . '/inc/functions-custom-header.php';

require get_template_directory() . '/inc/functions-customizer.php';

require get_template_directory() . '/inc/functions-enqueue.php';

require get_template_directory() . '/inc/functions-general.php';

if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/functions-jetpack.php';
}

require get_template_directory() . '/inc/functions-template-tags.php';

require get_template_directory() . '/inc/functions-widgets.php';

if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/functions-woocommerce.php';   
}