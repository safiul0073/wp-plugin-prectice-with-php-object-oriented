<?php

/**
 * @package Prectice1
 */
namespace Inc\API;

class SettingApi {
    
    public array $admin_pages = array();
    public array $admin_subpage = array();
    public array $settings = array();
    public array $sections = array();
    public array $fields = array();

    public function register () {

        if ( ! empty($this->admin_pages) && ! empty($this->admin_subpage) ) {
            add_action('admin_menu', array($this, 'addAdminPage'));
        }

        if (! empty($this->settings) && !empty($this->sections) && !empty($this->sections)) {
            add_action( 'admin_init', array($this, 'registerCustomFields') );
        }
    }

    public function addPages ( array $pages) {
        $this->admin_pages = $pages;
        return $this;
    }

    public function addSubPages ( array $pages) {
        $this->admin_subpage = $pages;
        return $this;
    }

    public function withSubPage ( string $title = null) {
        
        if (empty($this->admin_pages)) return $this;
        $perent_page = $this->admin_pages[0];
        $this->admin_subpage = array(
            array(
                "parent_slug"   => $perent_page['menu_slug'],
                "page_title"    => $perent_page['page_title'],
                "menu_title"    => $title ? $title : $perent_page['menu_title'],
                "capability"    => $perent_page['capability'],
                "menu_slug"     => $perent_page['menu_slug'],
                "callback"      => $perent_page['callback'],
            ),
        );
        
        return $this;
    }

    public function addAdminPage () {
        
        foreach ($this->admin_pages as $page) {
            add_menu_page(
                $page['page_title'], 
                $page['menu_title'], 
                $page['capability'], 
                $page['menu_slug'], 
                $page['callback'], 
                $page['icon_url'], 
                $page['position']
            );
        }
        
        foreach ($this->admin_subpage as $page) {
            add_submenu_page(
                $page['parent_slug'],
                $page['page_title'], 
                $page['menu_title'], 
                $page['capability'], 
                $page['menu_slug'], 
                $page['callback'], 
            );
        }
    }

    public function addSettings ( array $settings) {
        $this->settings = $settings;
        return $this;
    }
    public function addSections ( array $sections) {
        $this->sections = $sections;
        return $this;
    }
    public function addFields ( array $fields) {
        $this->fields = $fields;
        return $this;
    }
    // registering custome fields
    public function registerCustomFields () {
        
        // set custom settings
        foreach ( $this->settings as $setting) {
            register_setting( $setting['option_group'], $setting['option_name'], (isset($setting['callback']) ? $setting['callback'] : '') );
        }

        // set custome section
        foreach ( $this->sections as $section ) {
            add_settings_section( $section['id'], $section['title'], (isset($setting['callback']) ? $setting['callback'] : ''), $section['page'] );
        }

        // set custome fields
        foreach ( $this->fields as $field ) {
            add_settings_field( $field['id'], $field['title'], 
            (isset($field['callback']) ? $field['callback'] : ''), $field['page'], $field['section'], 
            (isset($field['args']) ? $field['args'] : '') );
        }
    }

 }