<?php
    //configuracion de la base de datos
    $db = require $contexto_app . '/app/database/config.php';

    //configuracion para key de encriptacion
    $jwt = array ('key' => ':Zm9gW^CRk4u,S*%', 'algorithms' => array('HS256'));

    //configuracion de la app
    $settings = array(
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => true,
        'db' => $db,
        'jwt' => $jwt
    );

    //se agrega el contexto de la app
    $settings['contexto'] = $contexto_app;
    return $settings;
?>