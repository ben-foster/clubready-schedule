<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/includes
 * @author     Ben Foster <ben@saltbox.solutions>
 */
class ClubReady_Schedule_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		// TODO: Refactor into deactivate cron method
		$timestamp = wp_next_scheduled( 'clubready_schedule_cron_hook' );
		wp_unschedule_event( $timestamp, 'clubready_schedule_cron_hook' );
	}

}
