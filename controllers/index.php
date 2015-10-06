<?php
    require('../classes/abstract/controller_base.php');
    require('../classes/template.php');

    Class Controller_Index Extends Controller_Base {
        function index() {
            $tpl = new Template('index');
            $tpl->parse();
        }
    }
?>
