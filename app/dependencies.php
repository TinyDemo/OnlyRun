<?php

declare(strict_types=1);

use App\Foundation\Validator;
use DI\ContainerBuilder;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Validation\Factory;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get('settings');

            $loggerSettings = $settings['logger'];
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        /*
         * 加载数据库.
         */
        'db' => function (ContainerInterface $container) {
            $settings = $container->get('settings');
            $capsule = new Capsule();
            $capsule->addConnection($settings['mysql']);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
        },
        /*
         * @var Factory Validator Factory 类
         */
        Factory::class => function (ContainerInterface $container) {
            return Validator::getInstance();
        },
    ]);
};
