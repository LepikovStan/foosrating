<?php
    // Константы:
    define('DIRSEP', DIRECTORY_SEPARATOR);

    // Узнаём путь до файлов сайта
    $site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP;
    define('SITE_PATH', $site_path);

    define('USER_DB_KEY', 'users');
    define('USER_DATA_KEY', 'user_data_');
    define('PLAYERS_KEY', 'players');
    define('PLAYER_DATA_KEY', 'player_data_');
?>
