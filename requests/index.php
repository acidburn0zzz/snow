<?php
if(!defined('SNOW')) { die('Cannot access directly!'); }

Class Index extends Snow\Controller {

    public $restful = true;

    public function get_main() {
        echo 'Hello from class Index that extends Base and the function name is main()';
        #View::test(); < THIS WITHOUT namespace Snow\Lib in /snow/lib/view.php
        \Snow\Lib\View::test(); # < OR THIS with namespace \Snow\Lib in /snow/lib/view.php
        $this->always_available();
    }

    public function post_main() {
        echo 'Posted!';
    }

}
