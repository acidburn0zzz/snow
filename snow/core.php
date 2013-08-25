<?php
namespace Snow;

if(!defined('SNOW')) { die('Cannot access directly!'); }

// Get the singleton first!
require_once SNOW_DIR . 'base.php';

// Get the base controller that must be extended.
require_once SNOW_DIR . 'controller.php';

// We need our static libs from the /snow/libs/ directory.
foreach(glob(SNOW_DIR . 'lib' . DS . '*.php') as $lib) { require_once $lib; }

// And finish it off with the router.
require_once SNOW_DIR . 'router.php';

// Go!
try {
    Router::go();
}catch (Exception $e) {
    trigger_error($e->getMessage());
}

echo round((microtime(1)-SNOW_START)*1000, 6) . 'ms<br>';
echo (memory_get_usage()%1000) . 'kB';
