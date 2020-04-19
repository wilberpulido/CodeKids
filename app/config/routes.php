<?php

use Phalcon\Mvc\Router as MyRouter;

$router = new MyRouter();

$router->addGet(
    '/',
    [
        'controller' => 'home',
        'action'     => 'home',
    ]
);


return $router;