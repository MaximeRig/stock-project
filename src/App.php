<?php

namespace App;

class App {

    private static $instance;

    public static function getInstance() :App {

        if (is_null(self::$instance)) {
            self::$instance = new App();
        }

        return self::$instance;
    }

}