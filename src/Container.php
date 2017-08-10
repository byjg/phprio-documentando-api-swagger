<?php

namespace Exemplo;

use ByJG\Config\Definition;

class Container
{
    private static $definition = null;
    private static $container = null;

    /**
     * @return \ByJG\Config\Container
     */
    public static function instance()
    {
        if (is_null(self::$container)) {
            self::$container = self::environment()->build();
        }

        return self::$container;
    }


    /**
     * @return Definition
     */
    public static function environment()
    {
        if (is_null(self::$definition)) {
            self::$definition = (new Definition())
                ->addEnvironment('dev');
            // ->setCache($somePsr16Implementation); // This will cache the result;
        }

        return self::$definition;
    }
}
