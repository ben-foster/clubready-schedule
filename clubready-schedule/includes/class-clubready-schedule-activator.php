<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/includes
 * @author     Ben Foster <ben@saltbox.solutions>
 */
class ClubReady_Schedule_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		require_once( plugin_dir_path( dirname( __FILE__ ) ) . 'database/class-clubready-schedule-database.php' );

		ClubReady_Schedule_Database::delete_tables();
		ClubReady_Schedule_Database::create_tables();

		if ( ! wp_next_scheduled( 'clubready_schedule_cron_hook' ) ) {
			wp_schedule_event( time(), 'fifteen_minutes', 'clubready_schedule_cron_hook' );
		}
	}

}
