<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://codesubmit.io
 * @since      1.0.0
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/admin
 * @author     CodeSubmit <hello@codesubmit.io>
 */
class Codesubmit_Schedule_Demo_Admin {

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
		
		//Hook to add function add_menu;
		add_action('admin_menu', array($this, 'add_menu'));

		//Call the class, that create fields in admin menu
		require_once(plugin_dir_path( __FILE__ ) . '/class-codesubmit-schedule-demo-admin-settings.php');
		$Codesubmit_Schedule_Settings = new Codesubmit_Schedule_Demo_Admin_Settings();
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
		 * defined in Codesubmit_Schedule_Demo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Codesubmit_Schedule_Demo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/codesubmit-schedule-demo-admin.css', array(), $this->version, 'all' );

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
		 * defined in Codesubmit_Schedule_Demo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Codesubmit_Schedule_Demo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/codesubmit-schedule-demo-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register menu in the admin area for 
	 * configuration the plugin.
	 *
	 * @since    1.0.0
	 */
	public function add_menu() {

		/**
		 * Here is register menu page
		 * with callback function that display
		 * in the admin page the html of partials/codesubmit-schedule...display.php
		 */
		add_menu_page(
			'Codesubmit options',
			'Codesubmit Schedule',
			'manage_options',
			'codesubmit_admin',
			array( $this, 'codesubmit_settings_page'),
			'dashicons-admin-generic',
		);
	}

	/**
     * Callback function is used in method add_menu. 
	 * 
     * @since    1.0.0
	 */
    function codesubmit_settings_page() {
		//Verify acess permitions
		if(!current_user_can('manage_options')) {
			return;
		}
		//Add error and success messages
		if(isset($_GET['settings-updated'])){
			add_settings_error('codesubmit_schedule_options', 'codesubmit_schedule_message', 'Availabilty Saved', 'success');
		}
		settings_errors('codesubmit_schedule_options');

       require( plugin_dir_path( __FILE__ ) . 'partials/codesubmit-schedule-demo-admin-display.php');
    }
}
