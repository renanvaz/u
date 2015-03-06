<?php

class UCore {
    /**
     * Init the U pointer
     * @return void
     */

    public static function proccess ($reports) {
        $status = TRUE;

        foreach ($reports['reports'] as &$report) {
            if (isset($report['reports'])) {
                $report = self::proccess($report);

                if (!$report['status']) {
                    $status = FALSE;
                }
            } else {
                if (!$report['status']) {
                    $status = FALSE;
                }
            }
        }

        $reports['status'] = $status;

        return $reports;
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

    /**
     * Load a view
     * @param  string $filename
     * @param  array $data
     * @return string
     */
    public static function view ($filename, $data) {
        extract($data, EXTR_SKIP);

        ob_start();

        try {
            include $filename;
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }
}
