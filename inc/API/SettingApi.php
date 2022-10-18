<?php

/**
 * @package Prectice1
 */
namespace Inc\API;

class SettingApi {
    
    public array $admin_pages = array();
    public array $admin_subpage = array();

    public function register () {

        if ( ! empty($this->admin_pages) ) {
            add_action('admin_menu', array($this, 'addAdminPage'));
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
        $subpage = array(
            array(
                "parent_slug"   => $perent_page['menu_slug'],
                "page_title"    => $perent_page['page_title'],
                "menu_title"    => ($title) ? $title : $perent_page['menu_title'],
                "capability"    => $perent_page['capability'],
                "menu_slug"     => $perent_page['menu_slug'],
                "callback"      => $perent_page['callback'],
            ),
        );

        $this->admin_subpage = $subpage;
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

 }