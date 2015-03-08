<?php

namespace ULib;

require_once('U.php');

class UCore {
    /**
     * Load a file with tests and create a group for this
     * @param  string $file Filename relative or absolute
     * @return void
     */
    public static function load ($file) {
        U::group('Test '.$file, function () use ($file) {
            require_once($file);
        });
    }

    /**
     * Get test result in a boolean status
     * @return boolean
     */
    public static function getBool () {
        return !U::getReport()['summary']['nok'];
    }

    /**
     * Get test result in a JSON string
     * @return string
     */
    public static function getJSON () {
        return json_encode(U::getReport());
    }
}
