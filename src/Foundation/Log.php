<?php

namespace App\Foundation;

use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log extends Logger
{
    public function __construct()
    {
        parent::__construct(getenv('ENV'));
        $logPath = APP_BASE_PATH.'/storage/'.date('Y-m-d').'.log';
        $this->pushHandler(new StreamHandler($logPath, Logger::DEBUG));
        $this->pushHandler(new FirePHPHandler());

    }
}
