<?php

/**
 * @package Prectice1
 */
namespace Inc\Base;

class BaseController {
    
    protected function get_plugin_url () {
        return plugin_dir_url( dirname(__FILE__, 2) );
    }

    protected function get_plugin_base_name () {
        return plugin_basename( dirname(__FILE__, 3) ) . '/prectice1.php';
    }

    protected function get_plugin_path () {
        return plugin_dir_path( dirname(__FILE__, 2) );
    }
 }