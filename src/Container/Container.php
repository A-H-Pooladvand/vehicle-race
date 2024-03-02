<?php

namespace Src\Container;

use DI\ContainerBuilder;

class Container
{
    public static \DI\Container $container;

    public static function getInstance(): \DI\Container
    {
        if (!isset(self::$container)) {
            self::$container = (new ContainerBuilder())->build();
        }

        return self::$container;
    }
}