<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Buildr for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require get_template_directory() . '/inc/lib/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'buildr_register_required_plugins' );


function buildr_register_required_plugins() {
    
    $plugins = array (

        array(
            'name'          => 'Buildr Features',
            'slug'          => 'buildr-features',
            'required'      => false,
        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array (
        'id' => 'buildr', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
        'strings'   => array(
            'menu_title'        => __( 'Theme Plugins', 'buildr' ),
            'page_title'        => __( 'Install the Buildr plugin to unlock the full customizable features of the theme', 'buildr' ),
              'notice_can_install_recommended'  => _n_noop(
              /* translators: 1: plugin name(s). */
              'This theme recommends the following plugin - Install this free plugin to unlock additional theme features: %1$s.',
              'This theme recommends the following plugins - Install these free plugins to unlock additional theme features: %1$s.',
              'buildr'
              ),
        ),
    );

    tgmpa( $plugins, $config );
}
