<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           ClubReady_Schedule
 *
 * @wordpress-plugin
 * Plugin Name:       ClubReady Schedule
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Saltbox
 * Author URI:        https://saltbox.solutions/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       clubready-schedule
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CLUBREADY_SCHEDULE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-clubready-schedule-activator.php
 */
function activate_clubready_schedule() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-clubready-schedule-activator.php';
	ClubReady_Schedule_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-clubready-schedule-deactivator.php
 */
function deactivate_clubready_schedule() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-clubready-schedule-deactivator.php';
	ClubReady_Schedule_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_clubready_schedule' );
register_deactivation_hook( __FILE__, 'deactivate_clubready_schedule' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-clubready-schedule.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_clubready_schedule() {

	$plugin = new ClubReady_Schedule();
	$plugin->run();

}
run_clubready_schedule();
