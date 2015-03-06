<?php

include 'phar://U.phar/U.php';

echo UCore::test();

//parse_str(implode('&', array_slice($argv, 1)), $_GET);

echo "\n";

__HALT_COMPILER();
