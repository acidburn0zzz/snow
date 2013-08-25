<?php
ob_start();
define('SNOW', true);

// This is the setup file which must be edited and reviewed by the user.
require_once './setup.php';

// Load the base class now. This class is a MITM between others.
require_once SNOW_DIR . 'core.php';

ob_flush();
