<?php

/**
 * @package Prectice1
 */
namespace Inc\API\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController{

    function checkboxSenitize ($input) 
    {
        return (isset($input) ? true : false);
    }

    public function adminSettingSection () 
    {
        echo "Mange Admin section";
    }

    public function checkBoxField ( $arge ) 
    {
        $class = $arge['class'];
        $name  = $arge['lebel_for'];
        $value = get_option( $name );

        echo '<input type="checkbox" value="1" name="'. $name .'" class="' . $class .'" ' . ($value ? "checked" : '') .'  ';
    }
}