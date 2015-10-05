<?php
    $registry = new Registry;
    $redis = new Redis;

    $registry->set('redis', $redis->getInstance());
?>
