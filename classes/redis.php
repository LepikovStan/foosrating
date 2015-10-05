<?php
    require("../predis/autoload.php");

    Class Redis {
        private $redis;

        public function __construct() {
            Predis\Autoloader::register();

            try {
                $this->redis = new Predis\Client();
                // This connection is for a remote server
                /*
                    $redis = new PredisClient(array(
                        "scheme" => "tcp",
                        "host" => "153.202.124.2",
                        "port" => 6379
                    ));
                */
            }
            catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function getInstance() {
            return $this->redis;
        }
    }
?>
