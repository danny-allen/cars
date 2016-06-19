<?php

$router = new Phalcon\Mvc\Router();

$router->add(
    '/login',
    [
        'controller' => 'users',
        'action'     => 'login',
    ]
);

return $router;