<?php

namespace Exemplo;

use ByJG\Swagger\SwaggerSchema;

class Helper
{

    /**
     * Valida o request em função da documentação do Swagger.
     *
     * @param $path
     * @param $method
     * @param $requestBody
     * @return bool
     */
    public static function validateRequest($path, $method, $requestBody)
    {
        $swaggerSchema = new SwaggerSchema(file_get_contents(__DIR__ . '/../web/docs/swagger.json'));
        $bodyRequestDef = $swaggerSchema->getRequestParameters($path, $method);
        return $bodyRequestDef->match($requestBody);
    }
}
