<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       http://dewy.fr/
 * @since      1.0.0
 *
 * @package    Wp_Dynamic_Summary
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

function wyde_uninstall_post_meta_summary(){
	$allposts = get_posts('post_type=post&post_status=any');

	foreach ($allposts as $singlepost) {
		delete_post_meta($singlepost->ID,'reading_time');
		delete_post_meta($singlepost->ID,'_summary');
	}
}

wyde_uninstall_post_meta_summary();