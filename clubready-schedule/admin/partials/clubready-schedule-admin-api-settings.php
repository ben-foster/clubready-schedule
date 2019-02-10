<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    ClubReady_Schedule
 * @subpackage ClubReady_Schedule/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="clubready-schedule-api-settings">
    <h2 class="clubready-schedule-settings-subheader">API Settings</h2>
    <form method="POST" action="options.php">
        <?php settings_fields( 'api_settings' ); ?>
        <?php do_settings_sections( 'api_settings' ); ?>
        <div class="clubready-schedule-form">
            <label for="api_key">API Key</label>
            <input type="text" name="api_key" value="<?php echo get_option( 'api_key' ); ?>"/>
            <label for="chain_id">Chain ID</label>
            <input type="text" name="chain_id" value="<?php echo get_option( 'chain_id' ); ?>"/>
            <?php submit_button(); ?>
        </div>
    </form>
</div>