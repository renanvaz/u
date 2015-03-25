<?php

namespace ULib;

class U {
    // Data, time
    private static $_report;
    private static $_pointer;

    /**
     * Reset the report and pointer
     * @return void
     */
    public static function reset () {
        self::$_report = ['summary' => ['asserts' => ['nok' => 0, 'ok' => 0], 'time' => 0], 'report' => []];
        self::$_pointer = &self::$_report;
    }

    /**
     * Register status of test
     * @param  string $description
     * @param  boolean $status
     * @return void
     */
    public static function assert ($description, $status) {
        $trace = debug_backtrace()[0];

        $report = [
            'description'   => $description,
            'status'        => !!$status,
            'trace'         => self::_getSnippet($trace['file'], $trace['line'])
        ];

        self::$_report['summary']['asserts']++;
        !!$status AND self::$_report['summary']['asserts']['ok']++;
        !$status  AND self::$_report['summary']['asserts']['nok']++;

        self::$_pointer['report'][] = $report;
    }

    /**
     * Create a group (or a sub group) of asserts with a description
     * @param  string $description
     * @param  function $fn
     * @return void
     */
    public static function group ($description, $fn) {
        if (!self::$_pointer) { self::reset(); }

        if (is_string($description)) {
            $description = ['title' => $description, 'description' => ''];
        }

        $newGroup = ['description' => $description, 'report' => []];
        $pointer = &self::$_pointer;

        self::$_pointer = &$newGroup;
        $pointer['report'][] = &self::$_pointer;

        $fn();

        self::$_pointer = &$pointer;
    }

    /**
     * Get the test result in a array data
     * @return array
     */
    public static function getReport () {
        return self::$_report;
    }

    /**
     * Get the file contents of a specific line
     * @param  string  $file
     * @param  integer $line
     * @return string
     */
    private static function _getSnippet ($file, $line) {
        $handle = fopen($file, 'r');
        $snippet = [];

        if ($handle) {
            $l = 1;
            $pad = strlen($line);

            while (($fileline = fgets($handle)) !== false) {
                if ($l >= $line-4 AND $l <= $line+1) {
                    $snippet[] = ['highlight' => ($l == $line), 'line' => $l, 'code' => preg_replace('/ /', '&nbsp;', htmlentities($fileline))];
                }
                $l++;
            }
        }

        fclose($handle);

        return $snippet;
    }
}
