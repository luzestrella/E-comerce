<?php
    $container['Cifrar'] = function($container) {
        return new app\services\Cifrar($container);
    };
?>