<?php
/*
Plugin Name: UltimateDoc
Plugin URI: https://github.com/ashrafuddin765/ultimate-doc
Description: Ultimate-Doc plugin is a simple and clean design.
Version: 1.0.0
Author: wpgrids
Author URI: httsp://wpgrids.net
License: GPLv2
Text Domain: ultimate-doc
 */

if ( !defined( 'ABSPATH' ) ) {
    die;
}

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

//Set plugin version constant.
define( 'UD_VERSION', '1.1.0' );
define( 'UD_PLUGIN_NAME', 'UltimateDoc' );
define( 'UD_INC', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'UD_DIR', plugin_dir_path( __FILE__ ) . '' );
define( 'UD_DIR_LY', plugin_dir_path( __FILE__ ) . 'template/' );
define( 'UD_FILE', __FILE__ );
define( 'UD_TEMPLATE', plugin_dir_path( __FILE__ ) . 'templates/' );
define( 'UD_MAIN', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'UD_ASSETS_CSS', plugins_url( 'assets/css/', __FILE__ ) );
define( 'UD_ASSETS_JS', plugins_url( 'assets/js/', __FILE__ ) );
define( 'UD_ASSETS_ASSETS', plugins_url( 'assets/img/', __FILE__ ) );
define( 'UD_LIB', plugin_dir_path( __FILE__ ) . 'lib/' );

add_action( 'init', 'init' );
function init() {

    register_theme_directory( dirname( __FILE__ ) . '/templates' );

    ud_update_exxisting_doc_type();
    ud_redirec_section_to_article();
}

if ( file_exists( UD_MAIN . 'init.php' ) ) {
    require_once UD_MAIN . 'init.php';
}
