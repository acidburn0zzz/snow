<?php
if(!defined('SNOW')) { die('Cannot access directly!'); }

// Start the counter!
define('SNOW_START', microtime(1));

Abstract Class Setup {
    // Debug level. 1 = development, 0 = production.
    const DEBUG         = true;
    // Full URI to your website. Used in templates and such.
    const URL           = 'http://localhost/snow/';
    // Down for maintenance or not?
    const MAINTENANCE   = false;
    // SQL Host. Usually this is "localhost".
    const SQL_HOST      = 'localhost';
    // SQL Username.
    const SQL_USERNAME  = 'root';
    // SQL Password.
    const SQL_PASSWORD  = '';
    // SQL Port. Default is 3306.
    const SQL_PORT      = 3306;
    // SQL Charset. utf8 is good practice.
    const SQL_CHARSET   = 'utf8';
    // SQL Database itself.
    const SQL_DATABASE  = 'skola';
    // You should not touch this.
    const VERSION       = 3.0;
}

// Sessions, most likely going to be needed.
session_start();

// You shouldn't worry about this at all, especially if you use RESTful implementations.
define('HTTP_POST', ($_SERVER['REQUEST_METHOD'] == 'POST' ? true : false));
define('HTTP_GET',  ($_SERVER['REQUEST_METHOD'] == 'GET'  ? true : false));
define('HTTP_AJAX', ($_SERVER['REQUEST_METHOD'] == 'xmlhttprequest' ? true : false));

// Root path, used to include files and whatnot.
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('SNOW_DIR', __DIR__ . DS . 'snow' . DS); # Snow's own root directory.
define('LANGUAGE', (isset($_COOKIE['lang'])) ? htmlspecialchars($_COOKIE['lang']) : null);

// You should not touch this, as well.
if(Setup::DEBUG) { error_reporting(-1); }else { error_reporting(0); }
