<?php
/**
 * Popular Posts
 *
 * A simple popular posts plugin
 *
 * @package   popular-posts
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
 * Text Domain: popular-posts-locale
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

// If this file is called directly, abort.
if (!defined("WPINC")) {
	die;
}

require_once(plugin_dir_path(__FILE__) . "PopularPosts.php");

// Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
register_activation_hook(__FILE__, array("PopularPosts", "activate"));
register_deactivation_hook(__FILE__, array("PopularPosts", "deactivate"));

PopularPosts::get_instance();