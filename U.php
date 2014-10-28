<?php
class U {
    public static $_reports = ['reports' => []];
    private static $_pointer;

    /**
     * Init the pointer
     * @return void
     */
    public static function init () {
        self::$_pointer = &self::$_reports;
    }

    /**
     * Register status of test
     * @param  string $description
     * @param  boolean $status
     * @return void
     */
    public static function assert ($description, $status) {
        $report = [
            'description' => $description,
            'status' => $status
        ];

        if ($status === FALSE) {
            $report['trace'] = debug_backtrace()[0];
        }

        self::$_pointer['reports'][] = $report;
    }

    /**
     * Create a group (or a sub group) of asserts with a description
     * @param  string $description
     * @param  function $fn
     * @return void
     */
    public static function group ($description, $fn) {
        $newGroup = ['description' => $description, 'reports' => []];
        $pointer = &self::$_pointer;

        self::$_pointer = &$newGroup;
        $pointer['reports'][] = &self::$_pointer;

        $fn();

        self::$_pointer = &$pointer;
    }

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
     * Generates a output HTML UI with the test results
     * @param  array $reports
     * @return string
     */
    public static function output ($reports = NULL) {
        $output = '<div class="group">'."\n";

        if (isset($reports['description'])) {
            $output .= '<h1>'.$reports['description'].'</h1>'."\n";
        }

        foreach($reports ? $reports['reports'] : U::$_reports['reports'] as $report) {
            if (isset($report['reports'])) {
                self::output($report);
            } else {
                $output .= '<div>'.$report['description'].' '.($report['status'] ? 'OK' : 'NOK').'</div>'."\n";
                if (!$report['status']) {
                    $output .= '<pre>'.print_r($report['trace'], true).'</pre>';
                }
            }
        }

        $output .= '</div>'."\n";

        return $output;
    }

    /**
     * Get the file contents of a specific line
     * @param  string  $file
     * @param  integer $numLines
     * @return string
     */
    public static function getSnippet ($file, $numLines = 4) {
        $handle = fopen($file, 'r');
        $snippet = '';

        if ($handle) {
            $l = 1;
            $pad = strlen($line);

            while (($fileline = fgets($handle)) !== false) {
                if ($l >= $line-$numLines AND $l <= $line+$numLines) {
                    $snippet .= '<p'.($l == $line ? ' class="highlight"' : '').'><span>'.$l.'</span>'.str_replace(['\n', ' ', '\t'], ['\n', '&nbsp;', '&nbsp;&nbsp;&nbsp;&nbsp;'], htmlentities($fileline)).'</p>';
                }
                $l++;
            }
        }

        return $snippet;
    }

}
