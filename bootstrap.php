<?php

chdir(__DIR__);
$composerAutoload = 'vendor/autoload.php';
if (false === file_exists($composerAutoload)) {
    trigger_error('Please, run the composer install.', E_USER_ERROR);
}

require $composerAutoload;

return call_user_func(function($environmentFile) {
    $container = new Respect\Config\Container();
    $container->config_environment_file = $environmentFile;
    $container->loadFile('config/application.ini');
    $application = $container->application;

    foreach ($application->php_settings as $settingName => $settingValue) {
        ini_set($settingName, $settingValue);
    }

    return $application;
},

call_user_func(function () {
    $defaultEnvironment     = 'dev';
    $identifiedEnvironment  = getenv('APP_ENV');
    $currentEnvironment     = $identifiedEnvironment ?: $defaultEnvironment;
    $environmentFile        = sprintf(__DIR__.'/config/environment/%s.ini', $currentEnvironment);

    if (false === file_exists($environmentFile)) {
        trigger_error('Configuration file does not exists: '.$environmentFile, E_USER_ERROR);
    }
    
    return $environmentFile; 
}));
