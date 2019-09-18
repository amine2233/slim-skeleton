<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

return function(ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        'settings' => [
            'debug' => true,
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name' => 'slim-php',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__.'/../log/app.log',
                'level' => Logger::DEBUG
            ],
            'doctrine' => [
                'name' => 'db.sqlite'
            ]
        ]
    ]);
};