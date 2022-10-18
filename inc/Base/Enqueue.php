<?php

/**
 * @package Prectice1
 */
namespace Inc\Base;
use Inc\Base\BaseController;

class Enqueue extends BaseController {
    
    public function register () {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function enqueue () {
        wp_enqueue_style('thispluginstyle', $this->get_plugin_path() . '/assets/mystyle.css' );
        wp_enqueue_script('thispluginscript', $this->get_plugin_path() . '/assets/myscript.js' );
    }
 }