<?php
namespace Snow;

if(!defined('SNOW')) { die('Cannot access directly!'); }

// Get the singleton first!
require_once SNOW_DIR . 'base.php';

// We need our static libs from the /snow/libs/ directory.
foreach(glob(SNOW_DIR . 'lib' . DS . '*.php') as $lib) { require_once $lib; }
#spl_autoload_register(function ($lib) {
#    require SNOW_DIR . 'lib' . DS . $lib . '.php';
#});

// Get the base controller that must be extended.
require_once SNOW_DIR . 'controller.php';

// Set the Error library to handle errors and exceptions.
set_error_handler(array('\Snow\Lib\Error', 'handle'));
register_shutdown_function(array('\Snow\Lib\Error', 'shutdown'));
set_exception_handler(function ($e) { trigger_error($e->getMessage(), E_USER_ERROR); });

// And finish it off with the router.
require_once SNOW_DIR . 'router.php';

// Pre-route hook.
if(method_exists('\Snow\Controller', 'ante_router')) { Controller::ante_router(); }

// Go!
try {
    Router::go();
}catch (Exception $e) { /* set_exception_handler() takes care of this. */ }

// Post-route hook.
if(method_exists('\Snow\Controller', 'post_router')) { Controller::post_router(); }
