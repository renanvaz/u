<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('phar.readonly', 'Off');
ini_set('phar.require_hash', 'Off');
error_reporting(E_ALL | E_STRICT);

@unlink('U.phar');

$phar = new Phar('U.phar');
$phar->buildFromDirectory('../src/');
$phar->setDefaultStub('cli.php');
