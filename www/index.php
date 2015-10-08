<?php
    error_reporting(E_ALL);
    if (version_compare(phpversion(), '5.1.0', '<') == true) { die ('PHP5.1 Only'); }

    function __autoload($class_name) {
        $filename = strtolower($class_name) . '.php';
        $file = site_path . 'classes' . DIRSEP . $filename;

        if (file_exists($file) == false) {
            return false;
        }

        require($file);
    }
    // Константы:
    define('DIRSEP', DIRECTORY_SEPARATOR);
    // Узнаём путь до файлов сайта
    $site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP;
    define('site_path', $site_path);
    require('../includes/start.php');
?>
