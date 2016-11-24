<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://dewy.fr/
 * @since      1.0.0
 *
 * @package    Wp_Dynamic_Summary
 * @subpackage Wp_Dynamic_Summary/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap wyde-wrap">
	<span class="dashicons dashicons-welcome-widgets-menus"></span><h2><?php echo esc_html(get_admin_page_title());?></h2>
	<em><?php _e('Administration pannel of this plugin good play !!', 'wp-dynamic-summary') ?></em>

	<div id="tabs">
	  <ul>
	    <li><a href="#tabs-1"><?php _e('Reading Time', 'wp-dynamic-summary') ?></a></li>
	    <li><a href="#tabs-2"><?php _e('Summary', 'wp-dynamic-summary') ?></a></li>
	  </ul>
	  <div id="tabs-1">
	    <p><?php _e('for see the reading time in the front office, you can paste this code in a wordpress template with the rafters PHP :', 'wp-dynamic-summary') ?></p>
	    <p id="code-reading-time"> echo get_post_meta($post->ID, 'reading_time', true) . "minutes"; </p>
	  </div>
	  <div id="tabs-2">
	  	<p><?php _e('for see the summary, you can paste this code in a wordpress template with the rafters PHP :', 'wp-dynamic-summary') ?></p>
	    <p id="code-summary">echo get_post_meta($post->ID, '_summary', true);</p>
	  </div>
	</div>
</div>