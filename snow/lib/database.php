<?php
namespace Snow\Lib;

if(!defined('SNOW')) { die('Cannot access directly!'); }

Class Database {
    protected static $instance;

    final protected function __construct() { /* Disallow. */  }
    final protected function __clone() { /* Disallow. */ }

    public static function getInstance() {
        if(!isset(self::$instance) || empty(self::$instance)) {
            try {
                self::$instance = new Database('mysql:host=' . SQL_HOST . ';dbname=' . SQL_DATABASE . ';charset=' . SQL_CHARSET, SQL_USERNAME, SQL_PASSWORD);
            }catch (PDOException $e) {
                throw new Exception('PDO Error: ' . $e->getMessage());
            }
        }else {
            return self::$instance; // It's already existant, just return it.
        }
    }

    /** Custom query builder thing. Not forced to use this whatsoever. You shouldn't use it. */
    public function query() {

    }
}
