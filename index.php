<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_STRICT);

require_once('U.php');

UCore::load('examples/Core.u.php');

echo UCore::getJSON();
