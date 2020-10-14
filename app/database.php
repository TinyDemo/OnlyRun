<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;
use Slim\App;

return function (App $app) {
    $settings = $app->getContainer()->get('settings');
    $capsule = new Capsule();
    $capsule->addConnection($settings['mysql']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
};
