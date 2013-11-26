<?php

namespace WiredMedia\PopularPostsPlugin;

class Settings{

    public function __construct() {
        add_action('admin_menu', array($this, 'add_settings_page'));
        add_action('admin_menu', array($this, 'save_settings'));
        add_filter("plugin_action_links_" . Plugin::get_instance()->main_file, array($this, 'add_settings_link'));
    }

    /**
     * Adds a plugin settings page
     *
     * @since 1.0
     */
    public function add_settings_page() {
        add_options_page(
            __('Popular posts Settings', 'popularposts'),
            __('Popular posts', 'popularposts'),
            'edit_plugins',
            'popularposts',
            array($this, 'settings_view')
        );
    }

    /**
     * Adds a settings link to the "Plugins" panel
     *
     * @since 1.0.3
     */
    public function add_settings_link($links) {
        array_unshift($links, '<a href="options-general.php?page=popularposts">Settings</a>');
        return $links;
    }

    /**
     * Validates the settings
     *
     * @since 1.0
     */
    public function validate_settings($settings) {
        foreach ($settings as $index => $setting) {
            if ($setting === 'true' || $setting === 'false')
                $settings[ $index ] = filter_var($setting, FILTER_VALIDATE_BOOLEAN );
        }
        return $settings;
    }

    /**
     * Saves the plugin settings
     *
     * @since 1.0
     */
    public function save_settings() {

        /** Bail if not our plugin page or not saving settings */
        if ( !isset($_GET['page'] ) )
            return;
        if ($_GET['page'] != 'popularposts')
            return;
        if ( !isset($_POST['settings'] ) )
            return;

        /** Security check. */
        if ( !check_admin_referer( "popularposts-save_{$_GET['page']}", "popularposts-save_{$_GET['page']}" )) {
            wp_die( __('Security check has failed. Save has been prevented. Please try again.', 'popularposts') );
            exit();
        }

        /** Save the settings */
        // update_option('popularposts_settings', stripslashes_deep($this->validate_settings($_POST['settings'] ) ) );

        /** Display success message */
        add_action('admin_notices', create_function('', 'echo "<div class=\"message updated\"><p>'. __('Settings have been saved successfully.', 'popularposts') .'</p></div>";') );

    }

    /**
     * Prints the settings page view
     *
     * @since 1.0
     */
    public function settings_view() {

        /** Get the plugin settings */
        $settings = $s = $this->validate_settings(get_option('popularposts_settings'));

        /** Print the view */
        ?>
        <div class="wrap">
            <div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
            <h2><?php _e('Popular posts', 'popularposts'); ?></h2>
            <form name="post" action="options-general.php?page=popularposts" method="post">
                <?php
                /** Security nonce field */
                wp_nonce_field( "popularposts-save_{$_GET['page']}", "popularposts-save_{$_GET['page']}", false );
                ?>

                <div class="main-panel">
                    <div class="section">
                        <table class="form-table settings">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><label for="post_types"><?php _e('Apply to which post types?', 'popularposts'); ?></label></th>
                                    <td>
                                        <input type="text" name="settings[post_types]" id="post_types" class="regular-text" value="<?php echo $s['post_types']; ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <p class="submit">
                        <input type="submit" name="save" class="button button-primary button-large" id="save" accesskey="p" value="<?php _e('Save Settings', 'popularposts'); ?>">
                    </p>
                </div>
            </form>
        </div>
        <?php
    }

}

new Settings;