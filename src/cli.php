<?php

Phar::mapPhar();

include 'phar://U.phar/U.php';

print_r($argv);

//parse_str(implode('&', array_slice($argv, 1)), $_GET);

__HALT_COMPILER();
