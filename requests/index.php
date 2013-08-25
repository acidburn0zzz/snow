<?php

Class Index extends Snow\Controller {

    public $restful = true;

    public function get_main() {
        echo 'Hello from class Index that extends Base and the function name is main()';
        #View::test();
        View::test();
        #echo 'Base test:<br>';
        #var_dump($this)
        #var_dump($test); // No $this->The_Helper :(
        $this->always_available();
    }

    public function post_main() {
        echo 'Posted!';
    }

}
