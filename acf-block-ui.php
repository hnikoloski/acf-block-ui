<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              https://hnikoloski.com
 * @since             1.0.0
 * @package           Acf_Block_Ui
 *
 * @wordpress-plugin
 * Plugin Name:       ACF Blocks UI
 * Plugin URI:        https://hnikoloski.com
 * Description:       UI for creating ACF Blocks. Create empty blocks from the admin area.
 * Version:           1.0.0
 * Author:            hNikoloski
 * Author URI:        https://hnikoloski.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       acf-block-ui
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('ACF_BLOCK_UI_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-acf-block-ui-activator.php
 */
function activate_acf_block_ui()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-acf-block-ui-activator.php';
	Acf_Block_Ui_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-acf-block-ui-deactivator.php
 */
function deactivate_acf_block_ui()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-acf-block-ui-deactivator.php';
	Acf_Block_Ui_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_acf_block_ui');
register_deactivation_hook(__FILE__, 'deactivate_acf_block_ui');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-acf-block-ui.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_acf_block_ui()
{

	$plugin = new Acf_Block_Ui();
	$plugin->run();
}
run_acf_block_ui();
