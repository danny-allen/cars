<?php

$router = new Phalcon\Mvc\Router();

//login
$router->add('/login', [
    'controller' => 'users',
    'action'     => 'login',
]);

//register
$router->add('/register', [
    'controller' => 'users',
    'action'     => 'register',
]);

return $router;