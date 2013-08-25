<?php
namespace Snow;

if(!defined('SNOW')) { die('Cannot access directly!'); }

Class Controller extends Base {
    // User added functions go here.
    // This acts as a helper.
    // Any request will be able to access functions from this controller.
    // Feel free to add your code here and delete this message.

    public function always_available() {
        echo '<b>This is always available, from everywhere.</b>';
    }
}
