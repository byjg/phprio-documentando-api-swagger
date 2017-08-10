<?php

require_once "../vendor/autoload.php";

use \ByJG\RestServer\RoutePattern;
use \ByJG\RestServer\HandleOutput\JsonHandler;

return [

    'ROUTE_CLASSMAP' => [
        'person' => 'Exemplo.Rest.Person',
    ],
    'ROUTE_PATH' => [
        new RoutePattern('GET', '/rest/{module:person}/{id}', JsonHandler::class),
        new RoutePattern('POST', '/rest/{module:person}', JsonHandler::class)
    ]
];
