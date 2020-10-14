<?php

declare(strict_types=1);

use App\Application\Actions\Index\DbAction;
use App\Application\Actions\Index\IndexAction;
use Slim\App;

return function (App $app) {
    $app->get('/', IndexAction::class);
    $app->get('/db', DbAction::class);
};
