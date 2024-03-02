<?php

use Dotenv\Dotenv;
use Src\app\Application;

container()->set(
    Application::class,
    new Application(dirname(__DIR__))
);

Dotenv::createImmutable(__DIR__ . "/..")->load();

error_reporting(E_ALL);

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    dd('set_error_handler', $errno, $errstr, $errfile, $errline);
});

set_exception_handler(function (Throwable $exception) {
    dd('set_exception_handler', $exception);
});

register_shutdown_function(function () {
    //    dd('Shutdown');
});

//if (!$app->environment('testing')) {
//    ini_set('display_errors', 'Off');
//}