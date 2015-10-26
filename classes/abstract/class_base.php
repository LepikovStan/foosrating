<?php
    Abstract Class Class_Base {
        protected $registry;
        protected $redis;

        function __construct($registry) {
            $this->registry = $registry;
            $this->redis = $this->registry['redis'];
        }
    }
?>
