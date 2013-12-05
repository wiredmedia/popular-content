<?php
/**
 * Popular Posts
 *
 * A simple popular posts plugin
 *
 * @package   popular-content
 * @author    Carl Hughes <carl.hughes@wiredmedia.co.uk>
 * @license   GPL-2.0+
 * @link      http://wiredmedia.co.uk
 * @copyright 11-19-2013 Wired Media
 *
 * @wordpress-plugin
 * Plugin Name: Popular Posts
 * Plugin URI:  http://wiredmedia.co.uk
 * Description: A simple popular posts plugin
 * Version:     1.0.0
 * Author:      Carl Hughes
 * Author URI:  http://wiredmedia.co.uk
 * Text Domain: popular-content-locale
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

namespace WiredMedia\PopularContentPlugin;

// TODO: think about hooking this in to jetpack stats instead of trying to track page views ourselves

// If this file is called directly, abort.
if (!defined("WPINC")) {
	die;
}

/**
 * Plugin, used for retreiving global variables.
 *
 */
class Plugin {
    /**
     * Plugin version, used for cache-busting of style and script file references.
     *
     * @since   1.0.0
     *
     * @var     string
     */
    public $version = "1.0.0";

    /**
     * The main plugin file
     *
     * @since    1.0.0
     *
     * @var      string
     */
    public $main_file = "popular-content/popular-content.php";

    /**
     * Unique identifier for your plugin.
     *
     * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
     * match the Text Domain file header in the main plugin file.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    public $slug = "popular-content";

    /**
     * Unique identifier for count meta_key.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    public $count_key = 'wired_post_views_count';

    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      object
     */
    protected static $instance = null;

    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    object    A single instance of this class.
     */
    public static function get_instance() {

        // If the single instance hasn"t been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

}

foreach (glob(plugin_dir_path(__FILE__) . 'lib/*.php') as $file) {
    require_once($file);
}
