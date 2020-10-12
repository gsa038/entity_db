<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

const MYSQL_HOST = 'mysql';
const MYSQL_DATABASE = 'entities';
const MYSQL_ROOT_USER = 'root';
const MYSQL_ROOT_PASSWORD = 'Hjvfirf55';

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/logs/app.log',
                'level' => Logger::DEBUG,
            ],
        ],
    ]);
};
