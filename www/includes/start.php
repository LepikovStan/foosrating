<?php
    //require "predis/autoload.php";

    //Predis\Autoloader::register();

   // try {
        //$redis = new Predis\Client();
        // This connection is for a remote server
        /*
            $redis = new PredisClient(array(
                "scheme" => "tcp",
                "host" => "153.202.124.2",
                "port" => 6379
            ));
        */
    //}
    //catch (Exception $e) {
    //    die($e->getMessage());
    //}
   error_reporting (E_ALL);
   if (version_compare(phpversion(), '5.1.0', '<') == true) { die ('PHP5.1 Only'); }

   // Константы:
   define ('DIRSEP', DIRECTORY_SEPARATOR);
   // Узнаём путь до файлов сайта
   $site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP;
   define ('site_path', $site_path);
?>
