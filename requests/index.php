<?php

Class Index extends Base {

    public $restful = true;

    public function get_main() {
        echo 'Hello from class Index that extends Base and the function name is main()';
        View::test();
        echo 'Base test:<br>';
        #var_dump($this)
        var_dump($this); // No $this->The_Helper :(
    }

    public function post_main() {
        echo 'Posted!';
    }

}
