<?php

require get_template_directory() . '/inc/constants.php';

require get_template_directory() . '/inc/functions-custom-header.php';

require get_template_directory() . '/inc/functions-fonts.php';

require get_template_directory() . '/inc/functions-enqueue.php';

require get_template_directory() . '/inc/functions-menus.php';

require get_template_directory() . '/inc/functions-general.php';

require get_template_directory() . '/inc/functions-helpers.php';

require get_template_directory() . '/inc/functions-template-tags.php';

require get_template_directory() . '/inc/functions-widgets.php';

require get_template_directory() . '/inc/functions-customizer.php';

require get_template_directory() . '/inc/functions-css.php';

if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/functions-jetpack.php';
}

if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/functions-woocommerce.php';   
}