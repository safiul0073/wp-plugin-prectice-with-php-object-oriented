<?php
/**
 * @package Prectice1
 * 
 */

 namespace Inc;

 final class Init {

    public static function get_services () {

        return [
            
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Base\CustomPostType::class,
            Pages\Admin::class,
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