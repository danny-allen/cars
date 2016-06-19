<?php

error_reporting(E_ALL);

define('APP_PATH', realpath('..'));

try {

    /**
     * Read the configuration
     */
    $config = include APP_PATH . "/app/config/config.php";

    /**
     * Read auto-loader
     */
    include APP_PATH . "/app/config/loader.php";

    /**
     * Read services
     */
    include APP_PATH . "/app/config/services.php";

    /**
     * Catch 404
     */
    include APP_PATH . "/app/config/404.php";

    /**
     * Set routes
     */
    $di->set(
        'router',
        function(){
            return include(__DIR__."/../app/config/routes.php");
        }
    );

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}