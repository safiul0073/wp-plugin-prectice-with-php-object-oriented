<?php

/**
 * @package Prectice1
 */
namespace Inc\Base;
use Inc\Base\BaseController;

class SettingsLinks extends BaseController {
    
    public function register () {
        add_filter("plugin_action_links_" . $this->get_plugin_base_name(), array($this, 'settings_link') );
    }

    public function settings_link ( $links ) {
        $setting_links = '<a href="admin.php?page=prectice1_custom_page">Settings</a>';
        array_push($links, $setting_links);
        return $links;
    }
 }