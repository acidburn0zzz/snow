<?php

Class Base {
    public function __set($var, $value) {
        #$this->vars[$var] = $value;
        $this->$var = $value;
    }

    public function __get($var) {
        #return $this->vars[$var];}
        return $this->$var;
    }
}
