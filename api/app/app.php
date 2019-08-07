<?php
    require $contexto_app . '/vendor/autoload.php';

    //agregar la configuracion de la aplicacon

    $settings = require $contexto_app . '/app/settings.php';

    if($env == 'production') {
            $settings['displayErrorDetails'] = false;
    }

    $app = new \Slim\App(
        array ('settings' => $settings)
    ); //creacion de las instancias de Slim

    //container de Slim
    $container = $app->getContainer();

    //Providers

    $providers = $contexto_app . '/app/providers/*.php';
    foreach(glob($providers) as $filename) require $filename;

    //routes
    $routes = $contexto_app . '/app/routes/*.php';
    foreach(glob($routes) as $filename) require $filename;

    $app->run();

?>