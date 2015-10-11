<?php
    require('../classes/abstract/controller_base.php');
    require('../classes/template.php');

    Class Controller_addplayer Extends Controller_Base {
        function index() {
            $errors = array();
            $errorHash = '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                foreach ($_POST as $key => $value) {
                    $errors[$key] = Template::validate($key, $value);
                }
            }

            if (!empty($errors)) {
                $errorHash = '?';

                foreach ($errors as $erkey => $ervalue) {
                    $errorHash .= 'error_' . $erkey . '=' . $ervalue . '&';
                }
            }

            header('Location: http://' . $_SERVER['HTTP_HOST'] . $errorHash, true, 301);
        }
    }
?>
