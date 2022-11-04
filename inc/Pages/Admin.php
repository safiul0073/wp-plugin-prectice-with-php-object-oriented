<?php

/**
 * @package Prectice1
 */
namespace Inc\Pages;

use Inc\API\SettingApi;
use Inc\Base\BaseController;
use Inc\API\Callbacks\AdminCallbacks;
use Inc\API\Callbacks\ManagerCallbacks;

class Admin extends BaseController{

    protected $settings;
    protected $callbacks;
    protected $callbacks_mger;

    public function __construct()
    {
        $this->settings = new SettingApi();
        $this->callbacks = new AdminCallbacks();
        $this->callbacks_mger = new ManagerCallbacks();
    }

    public function register () {
        // add_action( 'admin_menu', array($this, 'register_my_custom_menu_page') );
        add_action('init', array($this, 'add_custom_post_type'));
        
        $this->customSettings()->sections()->fields();
        
        $this->settings->addPages( $this->menuPages() )
                       ->withSubPage( 'Dashboard' )
                       ->addSubPages( $this->menuSubPage() )
                       ->register();
        
    }

    public function add_custom_post_type () {
        register_post_type('slider',array(
                'labels'      => array(
                    'name'          => __('Slider', 'textdomain'),
                    'singular_name' => __('Slider', 'textdomain'),
                ),
                    'public'      => true,
                    'has_archive' => true,
            )
        );
    }

    // settings 
    private function customSettings () {
        
        $settings = array();
        foreach ($this->managerList() as $key => $value) {
            $settings[] = array(
                            "option_group"  => 'prectice_option_settings',
                            "option_name"   => $key,
                            'callback'      => array($this->callbacks_mger, 'checkboxSenitize')
                        );
        }
        $this->settings->addSettings($settings);
        return $this;
    }
    private function sections () {
        $secs = array (
            array(
                "id"            => 'prectice_admin_index',
                "title"         => 'Manage Settings',
                "callback"      => array($this->callbacks_mger, 'adminSettingSection'),
                "page"          => 'prectice1_custom_page'
            )
        );
        $this->settings->addSections($secs);
        return $this;
    }
    private function fields () {

        $field = array ();
        foreach ( $this->managerList() as $key => $value) {
            $field[] = array(
                    "id"        => $key,
                    "title"     => $value,
                    'callback'  => array($this->callbacks_mger, 'checkBoxField'),
                    "page"      => 'prectice1_custom_page',
                    "section"   => 'prectice_admin_index',
                    'args'      =>  array(
                        "lebel_for"     => $key,
                        "class"         => 'ui-toggle',
                        "option_name"   => "prectice_option_settings"
                    )
                );
        }
        $this->settings->addFields($field);
        return $this;
    }

    // register custome admin menus  
    private function menuPages () {
        return array(
                array(
                    "page_title"    => 'Slider',
                    "menu_title"    => 'Slider Page',
                    "capability"    => 'manage_options',
                    "menu_slug"     => 'prectice1_custom_page',
                    "callback"      => array($this->callbacks, 'adminDashboard'),
                    "icon_url"      => 'dashicons-welcome-widgets-menus',
                    "position"      => 90
                ),
            );
    }

    private function menuSubPage () {
        return array(
            array(
                "parent_slug"   => 'prectice1_custom_page',
                "page_title"    => 'CPT',
                "menu_title"    => 'CPT Page',
                "capability"    => 'manage_options',
                "menu_slug"     => 'prectice1_custom_cpt',
                "callback"      => function() {echo "Custom post Type";},
            ),
            array(
                "parent_slug"   => 'prectice1_custom_page',
                "page_title"    => 'Media',
                "menu_title"    => 'Media Page',
                "capability"    => 'manage_options',
                "menu_slug"     => 'prectice1_custom_media',
                "callback"      => function() {echo "media";},
            ),
            array(
                "parent_slug"   => 'prectice1_custom_page',
                "page_title"    => 'Crop',
                "menu_title"    => 'Crop Page',
                "capability"    => 'manage_options',
                "menu_slug"     => 'prectice1_custom_crop',
                "callback"      => function() {echo "Croping";},
            ),
            array(
                "parent_slug"   => 'prectice1_custom_page',
                "page_title"    => 'Edit Slide',
                "menu_title"    => 'Edit Slide Page',
                "capability"    => 'manage_options',
                "menu_slug"     => 'prectice1_custom_edit',
                "callback"      => function() {echo "edit to slide";},
            ),
            array(
                "parent_slug"   => 'prectice1_custom_page',
                "page_title"    => 'Trash Media',
                "menu_title"    => 'Trash Media Page',
                "capability"    => 'manage_options',
                "menu_slug"     => 'prectice1_custom_trash',
                "callback"      => function() {echo "trash media";},
            ),
        );
    }

}
