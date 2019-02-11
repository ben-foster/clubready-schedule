<?php

/**
 * The shortcode functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/database
 */

/**
 * The shortcode functionality of the plugin.
 *
 * Defines the plugin name, version
 *
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/shortcode
 * @author     Ben Foster <ben@saltbox.solutions>
 */
class ClubReady_Schedule_Shortcode {

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

	}

	public function register_shortcodes() {
		add_shortcode('clubready_schedule', array( $this, 'clubready_schedule_shortcode' ) );
	}

	public function clubready_schedule_shortcode( $atts = [], $content = null, $tag = '' ) {
		return "proof of concept shortcode";
	}
}