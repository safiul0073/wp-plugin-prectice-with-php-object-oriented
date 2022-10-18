<?php
/**
 * Plugin Name:       Prectice1
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            safiul
 * Author URI:        https://safiul.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       prectice
 * Domain Path:       /
 */

defined( "ABSPATH" ) or die("You not in access this repo");

// composer autoloader added
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// plugin activation 
if (class_exists('Activate')) {
    function prectic1_plugin_activate () {
        Inc\Base\Activate::activate();
    }
}
if (function_exists('prectic1_plugin_activate')) {
    register_activation_hook(__FILE__, 'prectic1_plugin_activate');
}

// plugin deactivation
if (class_exists('Deactivate')) {
    function prectic1_plugin_deactivate () {
        Inc\Base\Deactivate::deactivate();
    }
}
if (function_exists('prectic1_plugin_deactivate')) {
    register_deactivation_hook(__FILE__, 'prectic1_plugin_deactivate');
}


// initializing all the needed classs
if (class_exists("Inc\\Init")) {
    Inc\Init::register_services();
}


