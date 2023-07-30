<?php

declare(strict_types=1);

use Phalcon\Cli\Console;
use Phalcon\Cli\Dispatcher;
use Phalcon\Di\FactoryDefault\Cli as CliDI;
use Phalcon\Cli\Console\Exception as PhalconException;
use Phalcon\Config\Config;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Dotenv\Dotenv;

require_once './vendor/autoload.php';

$container  = new CliDI();
$dispatcher = new Dispatcher();

$rootPath = __DIR__;

(Dotenv::createImmutable($rootPath))->load();

$container->setShared('dispatcher', $dispatcher);
$dispatcher->setDefaultNamespace('Vokuro\\Tasks');

$container->setShared('config', function () {
    try {
        $di = include './config/config.php';
        return new Config($di) ;
    } catch (\Exception $e) {
        die("<b>Error when initializing config connection:</b> " . $e->getMessage());
    }
});

$container->setShared('db', function() {

    try {
        $db = new Mysql(
            array(
                "host" => $_ENV['DB_HOST'],
                "port"   => $_ENV['DB_PORT'],
                "username" => $_ENV['DB_USERNAME'],
                "password" => $_ENV['DB_PASSWORD'],
                "dbname" => $_ENV['DB_NAME'],
            )
        );
    } catch (Exception $e) {
        die("<b>Error when initializing database connection:</b> " . $e->getMessage());
    }
    return $db;
});

$console = new Console($container);


foreach ($argv as $k => $arg) {
    if ($k === 1) {
        $arguments['task'] = $arg;
    } elseif ($k === 2) {
        $arguments['action'] = $arg;
    } elseif ($k >= 3) {
        $arguments['params'][] = $arg;
    }
}

try {
    $console->handle($arguments);
} catch (PhalconException $e) {
    fwrite(STDERR, $e->getMessage() . PHP_EOL);
    exit(1);
}