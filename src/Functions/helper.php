<?php

use Src\App\Application;
use Src\Container\Container;

if (!function_exists('container')) {
    function container(): \DI\Container
    {
        return Container::getInstance();
    }
}

if (!function_exists('base_path')) {
    /**
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    function base_path(string $path = '')
    {
        return app()->basePath($path);
    }
}

if (!function_exists('app')) {
    /**
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    function app()
    {
        return \container()->get(Application::class);
    }
}

if (!function_exists('make')) {
    /**
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    function make(string $name, array $parameters = [])
    {
        return \container()->make($name, $parameters);
    }
}

if (!function_exists('env')) {

    function env(string $name, mixed $default = null)
    {
        return $_ENV[$name] ?? $default;
    }
}
