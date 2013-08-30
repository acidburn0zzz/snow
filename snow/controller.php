<?php
namespace Snow;

if(!defined('SNOW')) { die('Cannot access directly!'); }

Class Controller extends Base {
    // User added functions go here.
    // This acts as a helper.
    // Any request will be able to access functions from this controller.
    // Feel free to add your code here and delete this message.

    public static function ante_router() {
        // This gets run before a request is called.
        echo Lib\View::render('header');
    }

    public static function post_router() {
        // This gets run after a request is made.
        $info           = Lib\Debug::debug_info();
        echo Lib\View::render('footer', array(
            'info'  =>  $info,
            'stack'  =>  Lib\Debug::$stack
        ));
    }

    public function always_available() {
        echo '<b>This is always available, from everywhere.</b>';
    }
}
