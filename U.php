<?php
class U {
    public static $_reports = [];
    private static $_currentGroup = [];

    public static function init () {
        U::$_currentGroup = ['description' => $description, 'reports' => []];
        self::$_reports[] = &self::$_currentGroup;
    }

    public static function assert($description, $status) {
        $report = [
            'description' => $description,
            'status' => $status
        ];

        self::$_currentGroup['reports'][] = $report;
    }

    public static function description($description, $fn) {
        $newGroup = ['description' => $description, 'reports' => []];

        self::$_currentGroup['reports'][] = &$newGroup;
        $currentGroup = &self::$_currentGroup;

        self::$_currentGroup = &$newGroup;

        $fn();

        self::$_currentGroup = $currentGroup;
    }
}
