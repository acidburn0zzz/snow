<?php
if(!defined('SNOW')) { die('Cannot access directly!'); }

Class Index extends \Snow\Controller {

    public $restful = true;

    public function get_main() {
        echo \Snow\Lib\View::render('welcome');
        #$this->always_available();

        #$db = \Snow\Lib\Database::getInstance(); // PDO works!
    }

    public function post_main() {
        echo 'Posted!';
    }

}
