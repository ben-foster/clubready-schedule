<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/admin
 * @author     Ben Foster <ben@saltbox.solutions>
 */
class ClubReady_Schedule_Admin {

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

	private $views;

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
		 * defined in ClubReady_Schedule_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ClubReady_Schedule_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/clubready-schedule-admin.css', array(), $this->version, 'all' );

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
		 * defined in ClubReady_Schedule_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ClubReady_Schedule_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/clubready-schedule-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function admin_main() {
		echo "Main";
	}

	public function admin_settings() {
		$file = plugin_dir_path( __FILE__ ) . 'partials/clubready-schedule-admin-api-settings.php';

		echo '<pre>'; print_r( _get_cron_array() ); echo '</pre>';
		// echo $wpdb->get_var("SHOW TABLES LIKE '$table_name'");

		global $wpdb;
		$table_name = 'wp_clubready_schedule_locations';

		if( file_exists($file) ){
			require_once( $file );
		}
	}

	public function update_api_settings() {
		register_setting( 'api_settings', 'api_key' );
		register_setting( 'api_settings', 'chain_id' );
	}

	public function add_to_menu() {
		add_menu_page(
			$page_title = 'ClubReady Schedule by Saltbox',
			$menu_title = 'CR Schedule',
			$capability = 'manage_options',
			$menu_slug = urlencode( $this->plugin_name ),
			$function = array( $this, 'admin_main'),
			$icon_url = 'dashicons-calendar'
		);

		add_submenu_page(
			$parent_slug = urlencode( $this->plugin_name ),
			$page_title = 'Locations',
			$menu_title = 'Locations',
			$capability = 'manage_options',
			$menu_slug = 'locations',
			$function = array( $this, 'admin_settings')
		);

		add_submenu_page(
			$parent_slug = urlencode( $this->plugin_name ),
			$page_title = 'Classes',
			$menu_title = 'Classes',
			$capability = 'manage_options',
			$menu_slug = 'classes',
			$function = array( $this, 'admin_settings')
		);

		add_submenu_page(
			$parent_slug = urlencode( $this->plugin_name ),
			$page_title = 'Instructors',
			$menu_title = 'Instructors',
			$capability = 'manage_options',
			$menu_slug = 'instructors',
			$function = array( $this, 'admin_settings')
		);

		add_submenu_page(
			$parent_slug = urlencode( $this->plugin_name ),
			$page_title = 'Settings',
			$menu_title = 'Settings',
			$capability = 'manage_options',
			$menu_slug = 'settings',
			$function = array( $this, 'admin_settings')
		);

		add_action( 'admin_init', array( $this, 'update_api_settings' ) );
	}

}
