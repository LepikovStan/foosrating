<?php
    require('../utils/utils.php');

    function getErrorMsg(){
        return array(
            'empty' => 'This field must be required'
        );
    }

    Class Template {
        private $file = '';
        private $template = false;
        private $vars = array(
            'staticPath' => '/static'
        );

        public static function validate($key, $value) {
            if (empty($value)) {
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

        function __construct($filename) {
            $this->file = SITE_PATH . DIRSEP . 'templates' . DIRSEP . $filename . '.tpl';
            $this->header = SITE_PATH . DIRSEP . 'templates' . DIRSEP . 'header.tpl';
            $this->footer = SITE_PATH . DIRSEP . 'templates' . DIRSEP . 'footer.tpl';

            if(empty($this->file) or !file_exists($this->file)) {
                exit('Has no such template file!');
            }

            $this->template = file_get_contents($this->header) . file_get_contents($this->file) . file_get_contents($this->footer);
            return $this;
        }

        function set($key, $var) {
            $this->vars[$key] = $var;
        }

        function render() {
            echo $this->template;
        }

        function parse() {
            foreach($this->vars as $find => $replace) {
                $this->template = str_replace('{'.$find.'}', $replace, $this->template);
            }
            $this->template = preg_replace('/\{.*\}/im', '', $this->template);

            return $this->template;
        }
    }
?>
