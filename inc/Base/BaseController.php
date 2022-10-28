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

    protected function managerList () {
        return array(
            "cpt_manager"         => "Activate CPT Manager",
            "texonomy_manager"    => "Activate Texonomy Manager",
            "media_widget"        => "Activate Media & Widget Manager",
            "gellary_manager"     => "Activate Gellary Manager",
            "testimonial_manager" => "Activate Testimonial Manager",
            "template_manager"    => "Activate Template Manager",
            "login_manager"       => "Activate Login & SignUp Manager",
            "membership_manager"  => "Activate Membership Manager",
            "chet_manager"        => "Activate Chet Manager"
        );
    }
 }