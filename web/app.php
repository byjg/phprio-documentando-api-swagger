<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \ByJG\RestServer\ServerRequestHandler;
use \Exemplo\Container;

/**
 * @SWG\Swagger(
 *     schemes={"http"},
 *     basePath="/rest",
 *     host="localhost:7000",
 *     consumes={"application/json"},
 *     produces={"application/json"},
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Rest API de Exemplo",
 *         description="Exemplo utilizado na apresentação do PHP Rio documentando a sua aplicação com o Swagger",
 *         termsOfService="http://localhost/terms/",
 *         @SWG\Contact(
 *             email="joao@byjg.com.br"
 *         ),
 *         @SWG\License(
 *             name="MIT",
 *             url="https://github.com/byjg/phprio-documentando-api-swagger"
 *         )
 *     ),
 *     @SWG\ExternalDocumentation(
 *         description="Extenal docs",
 *         url="https://example.com"
 *     )
 * )
 * @SWG\SecurityScheme(
 *   securityDefinition="jwt-token",
 *   type="apiKey",
 *   in="header",
 *   name="Authorization"
 * )
 * @SWG\Definition(
 *   definition="errorProperties",
 *   @SWG\Property(property="type", type="string", description="A class de Exceção"),
 *   @SWG\Property(property="message", type="string", description="A mensagem de erro"),
 *   @SWG\Property(property="file", type="string", description="O arquivo que gerou o erro"),
 *   @SWG\Property(property="line", type="integer", description="A linha do erro")
 * )
 * @SWG\Definition(
 *   definition="error",
 *   @SWG\Property(property="error", ref="#/definitions/errorProperties")
 * )
 */

ServerRequestHandler::handle(
    Container::instance()->get('ROUTE_CLASSMAP'),
    Container::instance()->get('ROUTE_PATH')
);
