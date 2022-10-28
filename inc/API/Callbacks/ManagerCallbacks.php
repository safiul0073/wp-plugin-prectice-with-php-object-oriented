<?php

/**
 * @package Prectice1
 */
namespace Inc\API\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController{

    function checkboxSenitize ($input) 
    {
        $output = array();
        foreach ( $this->managerList() as $key => $value) {
            $output[$key] = isset($input[$key]) ? true : false;
        }
        return $output;
    }

    public function adminSettingSection () 
    {
        echo "Mange Admin section";
    }

    public function checkBoxField ( $arge ) 
    {
        $class = $arge['class'];
        $name  = $arge['lebel_for'];
        $option_name = $arge['option_name'];
        $checkbox = get_option( $option_name );
        echo '<input type="checkbox" value="1" name="' . $option_name .'['. $name .']" class="' . $class .'" ' . ($checkbox[$name] ? "checked" : '') .'  ';
    }
}