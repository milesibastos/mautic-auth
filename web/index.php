<?php

use Base\View\ApplicationJson;
use Base\View\TextXml;
use Base\Service\ServiceLocator;

$container  = require __DIR__ .'/../bootstrap.php';
$router     = $container->router;

$router->always(
    'Accept', [
        '.json'             => $applicationJson = new ApplicationJson,
        'application/json'  => $applicationJson,
        '.xml'              => new TextXml
    ]
);

/* prevent XSS attack */
$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

/** Initializing the ServiceLocator **/
ServiceLocator::setInstance($container->serviceLocator);

session_start();

echo $router->run();