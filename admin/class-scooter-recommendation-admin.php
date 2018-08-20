<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Scooter_Recommendation
 * @subpackage Scooter_Recommendation/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Scooter_Recommendation
 * @subpackage Scooter_Recommendation/admin
 * @author     Christian <nwachukwu16@gmail.com>
 */
class Scooter_Recommendation_Admin {

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
	public function enqueue_styles($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Scooter_Recommendation_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Scooter_Recommendation_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/scooter-recommendation-admin.css', array(), $this->version, 'all' );
		
		wp_enqueue_style( 'datatable-css', 'https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css', "", "", false );
			
		
		if($hook === "recommendation_page_scooter-recommendation-view_temp"){

			wp_enqueue_style( 'data-table-css', plugin_dir_url( __FILE__ ) . 'css/data-view.css', array(), $this->version, 'all' );
		}
		if($hook === "recommendation_page_new-scooter-recommendation" || $hook === "recommendation_page_scooter-recommendation-view"){
			wp_enqueue_style( 'buttons-css', plugin_dir_url( __FILE__ ) . 'css/buttons.css', array(), $this->version, 'all' );
		}


		echo $hook;

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Scooter_Recommendation_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Scooter_Recommendation_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/scooter-recommendation-admin.js', array( 'jquery' ), $this->version, false );
		
		wp_enqueue_script('jquery');

		wp_enqueue_script('jquery-datatable', 'https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js', "", "", true);
		
		wp_enqueue_script( 'data-table', plugin_dir_url( __FILE__ ) . 'js/data-table.js', array( 'jquery' ), $this->version, true );
		
		/* Load the following scripts conditionally if you are on any of these pages */
		if($hook === "recommendation_page_new-scooter-recommendation" ||  $hook === "recommendation_page_scooter-recommendation-view"){
			
			//Add the vue Js file
			wp_register_script( "vue-js", "https://cdn.jsdelivr.net/npm/vue/dist/vue.js",$this->version,"", true );
			
			//Add the js file to hold vueJs codes
			wp_register_script( "vue-js-script", plugin_dir_url( __FILE__ ) . 'js/vue-js-admin.js',$this->version,"", true );

			wp_enqueue_script('vue-js');
			
			wp_enqueue_script('vue-js-script');

		}

		//Shows the current page - remove later
		echo " - ".$hook;

	}


	/**
*
* admin/class-wp-cbf-admin.php - Don't add this
*
**/

/**
 * Register the administration menu for this plugin into the WordPress Dashboard menu.
 *
 * @since    1.0.0
 */

public function add_plugin_admin_menu() {

    /*
     * Add a settings page for this plugin to the Settings menu.
     *
     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
     *
     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
     *
     */
	
	 add_menu_page(
                        'Scooter Recommendation Tag',
                        'Recommendation',
                        'manage_options',
                        'uchenna-scooter-recommendation',
                        array($this, 'display_plugin_setup_page'),
                        'dashicons-universal-access-alt', 
                        9
					);
					
	add_submenu_page( 
						"uchenna-scooter-recommendation",
						"",
						"",
						"manage_options",
						"uchenna-scooter-recommendation",
						array($this, 'display_plugin_setup_page')
					);

		add_submenu_page( 
						"uchenna-scooter-recommendation",
						"new-scooter-recommendation",
						"Add New",
						"manage_options",
						"new-scooter-recommendation",
						array($this, 'new_scooter_recommendation_admin')
					);

		add_submenu_page( 
						"uchenna-scooter-recommendation",
						"Scooter Recommendation Submissions",
						"Submissions",
						"manage_options",
						"scooter-recommendation-submissions",
						array($this, 'scooter_recommendation_submissions')
					);

		add_submenu_page( 
						"uchenna-scooter-recommendation",
						"Scooter Recommendation Settings",
						"Settings",
						"manage_options",
						"scooter-recommendation-settings",
						array($this, 'scooter_recommendation_settings')
					);

	// Page to view a single scooter
		add_submenu_page( 
						"uchenna-scooter-recommendation",
						"",
						"",
						"manage_options",
						"scooter-recommendation-view",
						array($this, 'view_scooter_details')
		);


	// Page to view a single scooter Submission
		add_submenu_page( 
						"uchenna-scooter-recommendation",
						"",
						"",
						"manage_options",
						"scooter-recommendation-single-submission-view",
						array($this, 'scooter_recommendation_single_submissions')
		);


}

 /**
 * Add settings action link to the plugins page.
 *
 * @since    1.0.0
 */

public function add_action_links( $links ) {
    /*
    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
    */
   $settings_link = array(
    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>',
   );
   return array_merge(  $settings_link, $links );

}

/**
 * Render the settings page for this plugin.
 *
 * @since    1.0.0
 */

public function view_scooter_details() {
    include_once( 'partials/view-scooter-details.php' );
}

/**
 * Render the settings page for this plugin.
 *
 * @since    1.0.0
 */

		public function display_plugin_setup_page() {
			include_once( 'partials/scooter-recommendation-admin-display.php' );
		}

		public function new_scooter_recommendation_admin() {
			include_once( 'partials/new-scooter-recommendation-admin.php' );
		}


		public function scooter_recommendation_settings() {
			include_once( 'partials/scooter-recommendation-settings.php' );
		}


		public function scooter_recommendation_submissions() {
			include_once( 'partials/scooter-recommendation-submissions.php' );
		}


		public function scooter_recommendation_single_submissions() {
			include_once( 'partials/scooter-recommendation-single-submissions.php' );
		}

		public function scr_validate_settings($input) {
			// create an array to save the inputs.      
			$valid = array();
		
			//Validate the user inputs and add them to the array.
			$valid['daily_use_title'] 			= sanitize_text_field($input['daily_use_title']);
			$valid['daily_use'] 				= sanitize_text_field($input['daily_use']);
			$valid['access_title']				= sanitize_text_field($input['access_title']);
			$valid['access'] 					= sanitize_text_field($input['access']);
			$valid['weight_range_title']		= sanitize_text_field($input['weight_range_title']);
			$valid['weight_range'] 				= sanitize_text_field($input['weight_range']);
			$valid['height_range_title'] 		= sanitize_text_field($input['height_range_title']);
			$valid['height_range'] 				= sanitize_text_field($input['height_range']);
			$valid['suspension_title'] 			= sanitize_text_field($input['suspension_title']);
			$valid['suspension'] 				= sanitize_text_field($input['suspension']);
			$valid['addition_question_title'] 	= sanitize_text_field($input['addition_question_title']);
			$valid['addition_question'] 		= sanitize_text_field($input['addition_question']);
			$valid['drivers_information_title'] = sanitize_text_field($input['drivers_information_title']);
			$valid['drivers_information']		= sanitize_text_field($input['drivers_information']);
		
			return $valid;
		 }


		public function scr_validate_result_page_settings($input) {
			// create an array to save the inputs.      
			$valid = array();
		
			//Validate the user inputs and add them to the array.
			$valid['result_title'] 			= sanitize_text_field($input['result_title']);
			$valid['result_description'] 	= sanitize_text_field($input['result_description']);
			$valid['result_not_found'] 		= sanitize_text_field($input['result_not_found']);
			
			return $valid;
		 }


		public function scr_result_page_settings_update() {
			register_setting($this->plugin_name."-result-page-settings", $this->plugin_name."-result-page-settings", array($this, 'scr_validate_result_page_settings'));
		}

		 public function scr_options_update() {
			register_setting($this->plugin_name, $this->plugin_name, array($this, 'scr_validate_settings'));
		}

	
}



