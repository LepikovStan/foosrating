<?php
    require('../classes/router.php');

    $registry = new Registry;
    $redis = new Redis;
    $router = new Router($registry);

    $registry->set('redis', $redis->getInstance());
    $registry->set('router', $router);

    $router->setPath(SITE_PATH . 'controllers');
    $router->delegate();
?>
