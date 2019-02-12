<?php

/**
 * The database interaction functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/database
 */

/**
 * The database interaction functionality of the plugin.
 *
 * Defines the plugin name, version
 *
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/database
 * @author     Ben Foster <ben@saltbox.solutions>
 */
class ClubReady_Schedule_Database {

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

	static $db_version;

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

	}

	static function init()
	{
	  self::$db_version = '1.0';
	}

	public static function create_tables() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		$locations_table_name = $wpdb->prefix . 'clubready_schedule_locations';

		$locations_sql = "CREATE TABLE IF NOT EXISTS $locations_table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			last_updated datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			store_id mediumint(9) unsigned NOT NULL,
			name varchar(100) NOT NULL,
			district_id smallint(5) unsigned NOT NULL,
			division_id smallint(5) unsigned NOT NULL,
			club_type varchar(50) NOT NULL,
			credit_balance smallint(4) NOT NULL,
			time_offset tinyint(2) NOT NULL,
			chain_id mediumint(9) unsigned NOT NULL,
			address_street_name varchar(100) NOT NULL,
			address_city varchar(50) NOT NULL,
			address_state_prov varchar(10) NOT NULL,
			address_postal_code varchar(10) NOT NULL,
			phone varchar(100) NOT NULL,
			email varchar(100) NOT NULL,
			location_name varchar(100) NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $locations_sql );

		add_option( 'clubready_schedule_db_version', self::$db_version );
	}

	// TODO: refactor into Location object
	public static function update_location(
		$store_id,
		$name,
		$district_id,
		$division_id,
		$club_type,
		$credit_balance,
		$time_offset,
		$chain_id,
		$address_street_name,
		$address_city,
		$address_state_prov,
		$address_postal_code,
		$phone,
		$email,
		$location_name
	) {
		global $wpdb;
		
		$table_name = $wpdb->prefix . 'clubready_schedule_locations';

		$existing_records = $wpdb->get_results( 
			"
			SELECT * 
			FROM $table_name
			WHERE store_id = $store_id
			"
		);

		$record_exists = count( $existing_records ) > 0;

		if ( $record_exists ){
			//do here
			$wpdb->update(
				$table_name,
				array(
					'last_updated' => current_time( 'mysql' ),
					'store_id' => $store_id,
					'name' => $name,
					'district_id' => $district_id,
					'division_id' => $division_id,
					'club_type' => $club_type,
					'credit_balance' => $credit_balance,
					'time_offset' => $time_offset,
					'chain_id' => $chain_id,
					'address_street_name' => $address_street_name,
					'address_city' => $address_city,
					'address_state_prov' => $address_state_prov,
					'address_postal_code' => $address_postal_code,
					'phone' => $phone,
					'email' => $email,
					'location_name' => $location_name,
				),
				array( 'store_id' => $store_id )
			);
		
		} else {
			$wpdb->insert(
				$table_name,
				array(
					'last_updated' => current_time( 'mysql' ),
					'store_id' => $store_id,
					'name' => $name,
					'district_id' => $district_id,
					'division_id' => $division_id,
					'club_type' => $club_type,
					'credit_balance' => $credit_balance,
					'time_offset' => $time_offset,
					'chain_id' => $chain_id,
					'address_street_name' => $address_street_name,
					'address_city' => $address_city,
					'address_state_prov' => $address_state_prov,
					'address_postal_code' => $address_postal_code,
					'phone' => $phone,
					'email' => $email,
					'location_name' => $location_name,
				)
			);
		}	
	}

}

ClubReady_Schedule_Database::init();