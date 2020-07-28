<?php

use App\Foundation\Application;

if (!function_exists('app')) {
    function app()
    {
        return Application::getInstance();
    }
}
