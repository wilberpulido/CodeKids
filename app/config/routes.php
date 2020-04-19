<?php

use Phalcon\Mvc\Router as MyRouter;

$router = new MyRouter();

$router->addGet(
    '/',
    [
        'controller' => 'estructura',
        'action'     => 'home',
    ]
);


return $router;