<?php
/**
 * @package Prectice1
 * 
 */

 namespace Inc;

 final class Init {

    public static function get_services () {

        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
    }

    public static function register_services () {

        foreach (self::get_services() as $class) {
            $service = self::intentiatate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    private static function intentiatate ( $class ) {
        
        return new $class();
    }
 }