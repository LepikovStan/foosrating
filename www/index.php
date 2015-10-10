<?php
    error_reporting(E_ALL);
    if (version_compare(phpversion(), '5.1.0', '<') == true) { die ('PHP5.1 Only'); }

    function __autoload($class_name) {
        $filename = strtolower($class_name) . '.php';
        $file = SITE_PATH . 'classes' . DIRSEP . $filename;

        if (file_exists($file) == false) {
            return false;
        }

        require($file);
    }
    require('../includes/const.php');
    require('../includes/start.php');
?>
