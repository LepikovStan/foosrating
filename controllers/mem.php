<?php
    require('../classes/abstract/controller_base.php');
    require('../classes/template.php');

    Class Controller_mem Extends Controller_Base {
        function index() {
            $tpl = new Template('index');
            $tpl->parse();
        }
        function view () {
            echo 'ae';
        }
    }
?>
