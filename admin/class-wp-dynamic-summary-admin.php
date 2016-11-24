<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://dewy.fr/
 * @since      1.0.0
 *
 * @package    Wp_Dynamic_Summary
 * @subpackage Wp_Dynamic_Summary/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Dynamic_Summary
 * @subpackage Wp_Dynamic_Summary/admin
 * @author     Dewy Mercerais <dewymercerais@gmail.com>
 */
class Wp_Dynamic_Summary_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Dynamic_Summary_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Dynamic_Summary_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-dynamic-summary-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Dynamic_Summary_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Dynamic_Summary_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-dynamic-summary-admin.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script('jquery-ui-tabs');

	}


	/**
	 * Register the reading time
	 *
	 * @since    1.0.0
	 */
	public function wyde_reading_time_summary($post_id, $post, $update) {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Dynamic_Summary_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Dynamic_Summary_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//This test prevents the operation of the script from the click on the button add post
		if( !$update ){
			return;
		}

		
		//no load this script in post revision
		if( wp_is_post_revision( $post_id ) ){
			return;
		}


		//no load this script in autosave
		if( defined( 'DOING_AUTOSAVE' ) and DOING_AUTOSAVE ){
			return;
		}


		//just for post
		if( $post->post_type != 'post' ){
			return;
		}

		/**
		 * Count words
		 *
		 * @since    1.0.0
		 */
		
		//reading time
		$word_count = str_word_count( strip_tags( $post->post_content ) );

		//300 words/minutes : wikipedia information
		$minutes = ceil( $word_count / 300 );

		//save in database
		update_post_meta( $post_id, 'reading_time', $minutes );
	}

	/**
	 * Register the dynamic summary
	 *
	 * @since    1.0.0
	 */
	public function wyde_generate_summary($post_id, $post, $update) {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Dynamic_Summary_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Dynamic_Summary_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//This test prevents the operation of the script from the click on the button add post
		if( !$update ){
			return;
		}

		
		//no load this script in post revision
		if( wp_is_post_revision( $post_id ) ){
			return;
		}


		//no load this script in autosave
		if( defined( 'DOING_AUTOSAVE' ) and DOING_AUTOSAVE ){
			return;
		}


		//just for post
		if( $post->post_type != 'post' ){
			return;
		}
	
		// prepare the content
		$html = str_get_html($post->post_content);

		//start the summary
		$summary = '<div class="wrap-summary">';
		$summary .= '<p>'. __('Summary', 'wp-dynamic-summary'). '</p>';
		$summary .= '<ul class="summary">';
 
		// search the title tag
		foreach($html->find('h2, h3, h4, h5, h6') as $element):

			// take brut title
			$title = $element->innertext;

			// no title tag void
			if ($title != ""):
						
				// make a slug of title
			    $slug = sanitize_title($title);

			    // add id="my-title" each title
			    $element->id = $slug;

			    	//add specific class for css of summary
			    	if($element->tag === 'h2'):
				    	$summary.= '<li><a href="#' . $slug . '" class="font-wp-summary-h2 js-scrollTo">' . $title . '</a><span></span></li>';
			    	elseif($element->tag === 'h3'):
			    		$summary.= '<li><a href="#' . $slug . '" class="font-wp-summary-h3 js-scrollTo">' . $title . '</a><span></span></li>';
			    	elseif($element->tag === 'h4'):
			    		$summary.= '<li><a href="#' . $slug . '" class="font-wp-summary-h4 js-scrollTo">' . $title . '</a><span></span></li>';
			    	elseif($element->tag === 'h5'):
			    		$summary.= '<li><a href="#' . $slug . '" class="font-wp-summary-h5 js-scrollTo">' . $title . '</a><span></span></li>';
			    	elseif($element->tag === 'h6'):
			    		$summary.= '<li><a href="#' . $slug . '" class="font-wp-summary-h6 js-scrollTo">' . $title . '</a><span></span></li>';
			    	endif;

			endif;

		endforeach;

		//disable the hook
		remove_action( 'save_post', array( $this,'wyde_generate_summary', 10, 3 ) );

		//update post
		wp_update_post( array( 'ID' => $post_id, 'post_content' => $html->innertext ) );

		//end summary
		$summary.= '</ul>';
		$summary.= '</div>';

		//update post meta for the post
		update_post_meta( $post_id, '_summary', $summary );

		//filter the post redirect destination url
		add_filter( 'redirect_post_location', array( $this, 'add_notice_query_var' ), 99 );
		
	}

	/**
	 * function for add query arg
	 * @since    1.0.0
	 */
	public function add_notice_query_var( $location ) {
	   remove_filter( 'redirect_post_location', array( $this, 'add_notice_query_var' ), 99 );
	   return add_query_arg( array( 'summary' => 'ok' ), $location );
	}


	/**
	 * function for add admin notices
	 * @since    1.0.0
	 */
	public function wyde_admin_notices() {
	   if ( isset( $_GET['summary'] ) ) {
	     echo '<div class="notice notice-info is-dismissible"><p>' . __('Great your summary is done...good job !!', 'wp-dynamic-summary') . '</p></div>';
		}
  	}


	public function wyde_add_my_menu_plugin(){

		/*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	     *
	     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	     */
	    add_menu_page( 'Dynamic Summary for post', __('Summary','wp-dynamic-summary'), 'manage_options', $this->plugin_name, array($this, 'wyde_display_plugin_setup_page'), 'dashicons-welcome-widgets-menus', 80 );

	}


	/**
	 * Register the setup admin page
	 * @since   1.0.0
	 */
	public function wyde_display_plugin_setup_page(){

		/*
		 * include admin page
		 */
		include_once('partials/wp-dynamic-summary-admin-display.php');
	}
}