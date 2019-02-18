<?php

class ClubReady_Schedule_Clubs_Table {
    
    private static $table_suffix = 'clubs';

	public function __construct() {
	}

    public static function create_table(){
		global $wpdb;
        $table_name = $wpdb->prefix . CLUBREADY_SCHEDULE_DATABASE_TABLE_PREFIX . self::$table_suffix;

		$charset_collate = $wpdb->get_charset_collate();

		$create_table_sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			last_updated datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			club_id mediumint(9) unsigned NOT NULL,
			name varchar(100) NOT NULL,
			district_id smallint(5) unsigned,
			division_id smallint(5) unsigned,
			club_type varchar(50),
			credit_balance smallint(4),
			time_offset tinyint(2),
			chain_id mediumint(9) unsigned NOT NULL,
			address_street varchar(100),
			address_city varchar(50),
			address_state_prov varchar(10),
			address_postal_code varchar(10),
			phone varchar(100),
			email varchar(100),
			location_name varchar(100),
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $create_table_sql );

		update_option( 'clubready_schedule_db_version', CLUBREADY_SCHEDULE_DATABASE_VERSION );

	}

	public static function update_table(){
		if( get_site_option( 'clubready_schedule_db_version' ) != CLUBREADY_SCHEDULE_DATABASE_VERSION ) {
			self::create_table();
		}

	}

	public static function delete_table(){
		global $wpdb;
        $table_name = $wpdb->prefix . CLUBREADY_SCHEDULE_DATABASE_TABLE_PREFIX . self::$table_suffix;

		$delete_table_sql = "DROP TABLE IF EXISTS $table_name";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $delete_table_sql );

		delete_option( 'clubready_schedule_db_version' );

	}

	public static function create( $clubready_club ) {
		global $wpdb;
		$table_name = $wpdb->prefix . CLUBREADY_SCHEDULE_DATABASE_TABLE_PREFIX . self::$table_suffix;
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . "model/class-clubready-schedule-club.php";
		$club = new ClubReady_Schedule_Club( $clubready_club );
		
		$wpdb->insert(
			$table_name,
			array(
				'last_updated' => current_time( 'mysql' ),
				'club_id' => $club->club_id,
				'name' => $club->name,
				'district_id' => $club->district_id,
				'division_id' => $club->division_id,
				'club_type' => $club->club_type,
				'credit_balance' => $club->credit_balance,
				'time_offset' => $club->time_offset,
				'chain_id' => $club->chain_id,
				'address_street' => $club->address_street,
				'address_city' => $club->address_city,
				'address_state_prov' => $club->address_state_prov,
				'address_postal_code' => $club->address_postal_code,
				'phone' => $club->phone,
				'email' => $club->email,
				'location_name' => $club->location_name,
			)
		);
	}

	public static function get_by_id( $club_id ) {
		global $wpdb;
        $table_name = $wpdb->prefix . CLUBREADY_SCHEDULE_DATABASE_TABLE_PREFIX . self::$table_suffix;

		$club = $wpdb->get_results( 
			"
			SELECT * 
			FROM $table_name
			WHERE club_id = $club_id
			"
		);

		require_once plugin_dir_path( dirname( __FILE__ ) ) . "model/class-clubready-schedule-club.php";

		print_r( $club );
	}

	public static function get_all() {
		global $wpdb;
		$table_name = $wpdb->prefix . CLUBREADY_SCHEDULE_DATABASE_TABLE_PREFIX . self::$table_suffix;

		$clubs = $wpdb->get_results( 
			"
			SELECT * 
			FROM $table_name
			"
		);

		require_once plugin_dir_path( dirname( __FILE__ ) ) . "model/class-clubready-schedule-club.php";

		print_r( $clubs );
	}

	public static function update( $clubready_club ) {
		global $wpdb;
		$table_name = $wpdb->prefix . CLUBREADY_SCHEDULE_DATABASE_TABLE_PREFIX . self::$table_suffix;
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . "model/class-clubready-schedule-club.php";
		$club = new ClubReady_Schedule_Club( $clubready_club );

		$existing_records = $wpdb->get_results( 
			"
			SELECT * 
			FROM $table_name
			WHERE club_id = $club->club_id
			"
		);

		$record_exists = count( $existing_records ) > 0;

		if ( $record_exists ){
			//do here
			$wpdb->update(
				$table_name,
				array(
					'last_updated' => current_time( 'mysql' ),
					'club_id' => $club->club_id,
					'name' => $club->name,
					'district_id' => $club->district_id,
					'division_id' => $club->division_id,
					'club_type' => $club->club_type,
					'credit_balance' => $club->credit_balance,
					'time_offset' => $club->time_offset,
					'chain_id' => $club->chain_id,
					'address_street' => $club->address_street,
					'address_city' => $club->address_city,
					'address_state_prov' => $club->address_state_prov,
					'address_postal_code' => $club->address_postal_code,
					'phone' => $club->phone,
					'email' => $club->email,
					'location_name' => $club->location_name,
				),
				array( 'club_id' => $club->club_id )
			);
		
		} else {
			self::create( $clubready_club );
		}	
	}

	public static function delete( $club_id ) {
		global $wpdb;
		$table_name = $wpdb->prefix . CLUBREADY_SCHEDULE_DATABASE_TABLE_PREFIX . self::$table_suffix;

		$wpdb->delete( 
			$table_name, 
			array( 'club_id' => $club_id ) 
		);
	}
}