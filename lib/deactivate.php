<?php

namespace WiredMedia\PopularPostsPlugin;

/**
 * Fired when the plugin is deactivated.
 *
 * @since    1.0.0
 *
 * @param    boolean $network_wide    True if WPMU superadmin uses "Network Deactivate" action, false if WPMU is disabled or plugin is deactivated on an individual blog.
 */
function deactivate($network_wide) {
    // TODO: Define deactivation functionality here
}

// Register hook that are fires when the plugin is deactivate
register_deactivation_hook(Plugin::get_instance()->main_file, 'WiredMedia\PopularPostsPlugin\deactivate');