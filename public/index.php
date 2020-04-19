<?php

// use Phalcon\Url;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql;

$loader = new Loader();

$loader->registerDirs(
    [
        '../app/controllers/',
        '../app/models/',
    ]
);

$loader->register();

$container = new FactoryDefault();

$container->set(
    'db',
    function () {
        return new Mysql(
            [
                'host'      => 'db',
                'username'  => 'root',
                'password'  => 'root',
                'dbname'    => 'users',
            ]
        );
    }
);

// Registering the view component
$container->set(
    'view',
    function () {
        $view = new View();

        $view->setViewsDir('../app/views/');

        return $view;
    }
);

$container->set(
    'router',
    function () {
        return include '../app/config/routes.php';
    }
);

$application = new Application($container);

try {
    $response = $application->handle(
        $_SERVER['REQUEST_URI']
    );

    $response->send();
} catch (\Exception $e) {
    echo 'Shit '.$e->getMessage();
}