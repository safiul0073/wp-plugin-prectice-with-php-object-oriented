<?php

/**
 * @package Prectice1
 */
namespace Inc\Pages;

use Inc\API\SettingApi;
use Inc\Base\BaseController;
use Inc\API\Callbacks\AdminCallbacks;


class Admin extends BaseController{

    protected $settings;
    protected $callbacks;

    public function __construct()
    {
        $this->settings = new SettingApi();
        $this->callbacks = new AdminCallbacks();
    }

    public function register () {
        // add_action( 'admin_menu', array($this, 'register_my_custom_menu_page') );
        add_action('init', array($this, 'add_custom_post_type'));
        $this->settings->addPages( $this->menuPages() )->withSubPage( 'Dashboard' )->addSubPages( $this->menuSubPage() )->register();
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
