<?php

namespace WiredMedia\PopularPostsPlugin;

/**
 * Load the plugin text domain for translation.
 *
 * @since    1.0.0
 */
add_action("init", function(){
    $domain = Plugin::get_instance()->slug;
    $locale = apply_filters("plugin_locale", get_locale(), $domain);

    load_textdomain($domain, WP_LANG_DIR . "/" . $domain . "/" . $domain . "-" . $locale . ".mo");
    load_plugin_textdomain($domain, false, dirname(plugin_basename(Plugin::get_instance()->main_file)) . "/lang/");
});