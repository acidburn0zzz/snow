<?php
namespace Snow\Lib;

if(!defined('SNOW')) { die('Cannot access directly!'); }

Class View {

    public static function render($filename = NULL, $vars = array()) {
        // We have to guess the filename.
        if(is_null($filename)) {
            $trace = debug_backtrace();
            if(isset($trace[1]['class']) && isset($trace[1]['function'])) {
                $filename = strtolower($trace[1]['class'] . '-' . $trace[1]['function']);
            }else {
                throw new \Exception('Could not guess the class name.');
            }
        }

        // Does the template file exist?
        $_f = ROOT . 'public' . DS . $filename . '.php';
        if(!file_exists($_f) || !is_readable($_f)) {
            throw new \Exception('Could not open or read the following template file: ' . $_f);
        }

        // Extract the variables passed, if there are any.
        if(!empty($vars)) { extract($vars); }

        // Parse away!
        ob_start();
        require_once $_f;

        return ob_get_clean();
    }

}
