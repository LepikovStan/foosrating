<?php
    Abstract Class Controller_Base {
        protected $registry;
        protected $redis;

        function __construct($registry) {
            $this->registry = $registry;
            $this->redis = $this->registry['redis'];
        }

        abstract function index();
    }
?>
