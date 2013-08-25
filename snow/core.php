<?php

// Get the singleton first!
require_once SNOW_DIR . 'base.php';

// Get the base controller that must be extended.
require_once SNOW_DIR . 'controller.php';

// We need our static libs from the /snow/libs/ directory.
foreach(glob(SNOW_DIR . 'lib' . DS . '*.php') as $lib) { require_once $lib; }

// And finish it off with the router.
require_once SNOW_DIR . 'router.php'; 
