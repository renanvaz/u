<?php
class U {
    public static $_reports = ['reports' => []];
    public static $_pointer;

    public static function init () {
        self::$_pointer = &self::$_reports;
    }

    public static function assert ($description, $status) {
        $report = [
            'description' => $description,
            'status' => $status
        ];

        self::$_pointer['reports'][] = $report;
    }

    public static function group ($description, $fn) {
        $newGroup = ['description' => $description, 'reports' => []];
        $pointer = &self::$_pointer;

        self::$_pointer = &$newGroup;
        $pointer['reports'][] = &self::$_pointer;

        $fn();

        self::$_pointer = &$pointer;
    }

    public static function load ($file) {
        U::group('Test '.$file, function () use ($file) {
            require_once($file);
        });
    }

    public static function output ($reports = NULL) {
        echo '<div class="group">'."\n";

        if (isset($reports['description'])) {
            echo '<h1>'.$reports['description'].'</h1>'."\n";
        }

        foreach($reports ? $reports['reports'] : U::$_reports['reports'] as $report) {
            if (isset($report['reports'])) {
                self::output($report);
            } else {
                echo '<div>'.$report['description'].' '.($report['status'] ? 'OK' : 'NOK').'</div>'."\n";
            }
        }
        echo '</div>'."\n";
    }

}
