<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   popular-content
 * @author    Carl Hughes <carl.hughes@wiredmedia.co.uk>
 * @license   GPL-2.0+
 * @link      http://wiredmedia.co.uk
 * @copyright 11-19-2013 Wired Media
 */

// If uninstall, not called from WordPress, then exit
if (!defined("WP_UNINSTALL_PLUGIN")) {
	exit;
}

// TODO: Define uninstall functionality here