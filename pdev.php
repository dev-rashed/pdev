<?php

/**
 * @link              https://edevtook.com
 * @since             1.0.0
 * @package           Pdev
 *
 * @wordpress-plugin
 * Plugin Name:       PDEV
 * Plugin URI:        https://edevtook.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Rashedul Islam
 * Author URI:        https://edevtook.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pdev
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PDEV_VERSION', '1.0.0' );

register_activation_hook( __FILE__ , function(){
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pdev-activator.php';
	Pdev_Activator::activate();
} );
register_deactivation_hook( __FILE__ , function() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pdev-deactivator.php';
	Pdev_Deactivator::deactivate();
});

require plugin_dir_path( __FILE__ ) . 'includes/class-pdev.php';

function run_pdev() {

	$plugin = new Pdev();
	$plugin->run();

}
run_pdev();
