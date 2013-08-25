<?php
if(!defined('SNOW')) { die('Cannot access directly!'); }

// Start the counter!
define('SNOW_START', time());

// Debug level. 1 = development, 0 = production.
define('DEBUG', 1);
session_start();
// Full URL to the project INCLUDING the trailing slash. Used in the template files and such.
define('URL', 'http://localhost/snow/');

// Shorthand HTTP verbs
define('HTTP_POST', ($_SERVER['REQUEST_METHOD'] == 'POST' ? true : false));
define('HTTP_GET',  ($_SERVER['REQUEST_METHOD'] == 'GET'  ? true : false));
define('HTTP_AJAX', ($_SERVER['REQUEST_METHOD'] == 'xmlhttprequest' ? true : false));

// Root path, used to include files and whatnot.
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('SNOW_DIR', __DIR__ . DS . 'snow' . DS); // Snow's own root directory.
// Whether you want your website to be down for maintenance or not.
// define('MAINTENANCE', 0);

/** You shouldn't touch these. */
define('VERSION', 2.0);
if(DEBUG) { error_reporting(-1); }else { error_reporting(0); }

// Which helpers to load and what to pass onto them as the construct?
#$helpers = array(
#    'test' => time()
#);
