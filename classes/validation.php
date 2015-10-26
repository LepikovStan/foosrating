<?php
    function getErrorMsg(){
        return array(
            'empty' => 'This field must be required'
        );
    }

    Class Validation {

        public static function validate($key, $value) {
            if ($value == '') {
                return 'empty';
            }
            return '';
        }

        public static function parseErrors() {
            $errors = array();
            $errorMsg = getErrorMsg();

            foreach ($_GET as $key => $value) {
                if (isset($key) && Utils::startsWith($key, 'error_') && isset($errorMsg[$value])) {
                    $errors[$key] = $errorMsg[$value];
                }
            }

            return $errors;
        }

    }
?>
