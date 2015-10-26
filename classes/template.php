<?php
    require('../utils/utils.php');

    Class Template {
        private $file = '';
        private $template = false;
        private $vars = array(
            'staticPath' => '/static'
        );

        function __construct($filename, $main = false) {
            $this->file = SITE_PATH . DIRSEP . 'templates' . DIRSEP . $filename . '.tpl';
            if ($main) {
                $this->header = SITE_PATH . DIRSEP . 'templates' . DIRSEP . 'header.tpl';
                $this->footer = SITE_PATH . DIRSEP . 'templates' . DIRSEP . 'footer.tpl';
            }

            if(empty($this->file) or !file_exists($this->file)) {
                exit('Has no such template file!');
            }

            if ($main) {
                $this->template = file_get_contents($this->header) . file_get_contents($this->file) . file_get_contents($this->footer);
            } else {
                $this->template = file_get_contents($this->file);
            }

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
