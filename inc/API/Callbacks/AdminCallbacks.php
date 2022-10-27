<?php

/**
 * @package Prectice1
 */
namespace Inc\API\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController{

    public function adminDashboard () {
        return require_once $this->get_plugin_path() . 'tamplates/admin.php';
    }

    public function precticeOptionGroup ( $input ) {
        return $input;
    }

    public function precticeAdminSection () {
        echo "this admin section here";
    }

    public function precticeOptionFields () {

        echo ' <input type="text" class="regular-text" name="text_example" value="' . esc_attr(get_option( 'text_example' )) .'">';
    }

    public function precticePrecticeName () {

        echo ' <input type="text" class="regular-text" name="prectice_name" value="' . esc_attr(get_option( 'prectice_name' )) .'">';
    }
}