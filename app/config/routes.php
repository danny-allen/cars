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

//blog posts
$router->add('/blog', [
    'controller' => 'posts',
    'action'     => 'index',
]);

//single post page
$router->add("/blog/([a-z\-]+)", [
	"controller" => "posts",
	"action"     => "show",
	"title"      => 1
]);

return $router;