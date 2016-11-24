<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://dewy.fr/
 * @since      1.0.0
 *
 * @package    Wp_Dynamic_Summary
 * @subpackage Wp_Dynamic_Summary/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Dynamic_Summary
 * @subpackage Wp_Dynamic_Summary/includes
 * @author     Dewy Mercerais <dewymercerais@gmail.com>
 */
class Wp_Dynamic_Summary_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-dynamic-summary',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
