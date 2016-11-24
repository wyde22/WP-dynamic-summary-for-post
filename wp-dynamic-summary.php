<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://dewy.fr/
 * @since             1.0.0
 * @package           Wp_Dynamic_Summary
 *
 * @wordpress-plugin
 * Plugin Name:       WP Dynamic Summary
 * Plugin URI:        http://dewy.fr/
 * Description:       Generate summary for your post
 * Version:           1.0.0
 * Author:            Dewy Mercerais
 * Author URI:        http://dewy.fr/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-dynamic-summary
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-dynamic-summary-activator.php
 */
function activate_wp_dynamic_summary() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-dynamic-summary-activator.php';
	Wp_Dynamic_Summary_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-dynamic-summary-deactivator.php
 */
function deactivate_wp_dynamic_summary() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-dynamic-summary-deactivator.php';
	Wp_Dynamic_Summary_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_dynamic_summary' );
register_deactivation_hook( __FILE__, 'deactivate_wp_dynamic_summary' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-dynamic-summary.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_dynamic_summary() {

	$plugin = new Wp_Dynamic_Summary();
	$plugin->run();

}
run_wp_dynamic_summary();
