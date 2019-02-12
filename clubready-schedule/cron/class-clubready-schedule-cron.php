<?php

/**
 * The cron task functionality of the plugin, which pulls data in from the ClubReady API to store in database.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/cron
 */

/**
 * The cron task functionality of the plugin, which pulls data in from the ClubReady API to store in database.
 *
 * Defines the plugin name, version
 *
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/cron
 * @author     Ben Foster <ben@saltbox.solutions>
 */
class ClubReady_Schedule_Cron {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		require_once plugin_dir_path( dirname( __FILE__ ) ) . "database/class-clubready-schedule-database.php";

	}

	public function add_cron_intervals( $schedules ) {
		$schedules['fifteen_minutes'] = array(
			'interval' => 10,
			'display'  => esc_html__( 'Every Fifteen Minutes' ),
		);

		return $schedules;
	}

	public function cron_tasks() {
		self::update_locations();
	}

	// TODO: refactor to somewhere else because this function could be manually called if the user wanted to manually update
	private static function update_locations() {
		$get_locations_url = "https://www.clubready.com/api/current/corp/" . get_option( 'chain_id' ) . "/clubs?ApiKey=" . get_option( 'api_key' );

		$result = self::curl( $get_locations_url );

		$location_arr = json_decode( $result, true );

		foreach ( $location_arr as $location ){

			ClubReady_Schedule_Database::update_location(
				$store_id = $location["Id"],
				$name = $location["Name"],
				$district_id = $location["DistrictId"],
				$division_id = $location["DivisionId"],
				$club_type = $location["ClubType"],
				$credit_balance = $location["CreditBalance"],
				$time_offset = $location["TimeOffset"],
				$chain_id = $location["ChainId"],
				$address_street_name = $location["Address"]["Street"],
				$address_city = $location["Address"]["City"],
				$address_state_prov = $location["Address"]["StateProv"],
				$address_postal_code = $location["Address"]["PostalCode"],
				$phone = $location["Phone"],
				$email = $location["Email"],
				$location_name = $location["LocationName"]
			);
			
		}
	}

	// TODO: refactor into static helper class
	private static function curl( $url ){
		$curl = curl_init();
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt( $curl, CURLOPT_URL, $url );

		$result = curl_exec( $curl );
		curl_close( $curl );

		return $result;
	}
}
