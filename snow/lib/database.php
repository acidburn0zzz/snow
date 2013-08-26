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
                self::$instance = new \PDO('mysql:host=' . \Setup::SQL_HOST . ';dbname=' . \Setup::SQL_DATABASE . ';charset=' . \Setup::SQL_CHARSET, \Setup::SQL_USERNAME, \Setup::SQL_PASSWORD, array(
                    \PDO::ATTR_PERSISTENT => true
                ));
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
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
