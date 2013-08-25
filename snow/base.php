<?php

namespace Snow;

/** Singleton */
Abstract Class Base {
    public static $vars = array();

    public function __set($name, $value) {
        self::$vars[$name] = $value;
    }

    public function __get($name) {
        if(isset(self::$vars[$name])) { return self::$vars[$name]; }else { return null; }
    }
}
