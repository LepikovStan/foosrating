<?php
    require('../classes/abstract/controller_base.php');
    require('../classes/template.php');

    Class Controller_logout Extends Controller_Base {
        function index() {
            session_start();
            session_destroy();
            header('Location: http://'.$_SERVER['HTTP_HOST'], true, 301);
        }
    }
?>
