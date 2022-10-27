<?php

/**
 * @package Prectice1
 */
namespace Inc\Base;

class LoaderPrectice {

    protected $actions;

    protected $filters;

    function __constrator () {
        $this->plugin_name = array();
        $this->plugin_version = array(); 
    }

    function addAction ($hook, $class_instence, $callback, $priority = 10, $accepted_arg = 1) {
        $this->actions = $this->add( $this->actions, $hook, $class_instence, $callback, $priority, $accepted_arg);
    }

    function addFilter ($hook, $class_instence, $callback, $priority = 10, $accepted_arg = 1) {
        $this->filters = $this->add( $this->filters, $hook, $class_instence, $callback, $priority, $accepted_arg);
    }

    private function add ($hooks, $hook, $class_instence, $callback, $priority, $accepted_arg) {

        $hooks[] = array(
            'hook'      => $hook,
            'callback'  => array($class_instence, $callback),
            'priority'  => $priority,
            'arge'      => $accepted_arg
        );
        return $hooks;

    }

    public function run () {
        
        if ( isset($this->actions )) {
            foreach ( $this->actions as $action ) {
                add_action( $action['hook'], $action['callback'], $action['priority'], $action['arge'] );
            }
        }

        if ( isset($this->filters )) {
            foreach ( $this->filters as $filter ) {
                add_filter( $filter['hook'], $filter['callback'], $filter['priority'], $filter['arge'] );
            }
        }
    }
 }