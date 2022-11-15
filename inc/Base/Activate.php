<?php

/**
 * @package Prectice1
 */
namespace Inc\Base;

class Activate {
    
    public static function activate () {
        flush_rewrite_rules();

        if ( get_option( 'prectice1_custom_page' )) {
            return;
        }

        update_option( 'prectice1_custom_page', array());
    }
 }