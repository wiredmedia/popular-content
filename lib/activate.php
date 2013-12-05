<?php

namespace WiredMedia\PopularContentPlugin;

/**
 * Fired when the plugin is activated.
 *
 * @since    1.0.0
 *
 * @param    boolean $network_wide    True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
 */
function activate($network_wide) {
    // TODO: Define activation functionality here
}

// Register hook that are fires when the plugin is activated
register_activation_hook(Plugin::get_instance()->main_file, 'WiredMedia\PopularPostsPlugi\activate');