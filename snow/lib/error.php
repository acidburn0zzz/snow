<?php
namespace Snow\Lib;

if(!defined('SNOW')) { die('Cannot access directly!'); }

Class Error {
    public static function handle($errno, $errstr, $errfile, $errline) {
        echo 'Error number: ' . $errno . '<br>';
        echo 'Error string: ' . $errstr . '<br>';
        echo 'Error file: ' . $errfile . '<br>';
        echo 'Error line: ' . $errline . '<br>';
    }

    public static function shutdown() {
        $last_error = error_get_last();
        // This is fatal...
        #var_dump($last_error);
    }

    // Nemoj zaboravit na error_log()!
}
