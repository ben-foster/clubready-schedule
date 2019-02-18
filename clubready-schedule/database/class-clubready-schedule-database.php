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
	
	// TODO: annotate

	public function __construct() {
	}

	public static function create_tables() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'database/class-clubready-schedule-clubs-table.php';
		ClubReady_Schedule_Clubs_Table::create_table();
	}

	public static function update_tables() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'database/class-clubready-schedule-clubs-table.php';
		ClubReady_Schedule_Clubs_Table::update_table();
	}

	public static function delete_tables() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'database/class-clubready-schedule-clubs-table.php';
		ClubReady_Schedule_Clubs_Table::delete_table();
	}

}