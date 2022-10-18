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
}