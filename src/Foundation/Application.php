<?php

namespace App\Foundation;

use Closure;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;

class Application extends Container implements \Illuminate\Contracts\Foundation\Application
{
    public function __construct(string $basePath = null)
    {
        if ($basePath) {
            $this->basePath($basePath);
        }
        static::setInstance($this);
        Facade::setFacadeApplication($this);
        $this->instance('app', $this);
        $this->instance(Container::class, $this);
    }

    public function version()
    {
        // TODO: Implement version() method.
    }


    public function basePath($path = '')
    {
        // TODO: Implement basePath() method.
    }

    public function bootstrapPath($path = '')
    {
        // TODO: Implement bootstrapPath() method.
    }

    public function configPath($path = '')
    {
        // TODO: Implement configPath() method.
    }

    public function databasePath($path = '')
    {
        // TODO: Implement databasePath() method.
    }

    public function resourcePath($path = '')
    {
        // TODO: Implement resourcePath() method.
    }

    public function storagePath()
    {
        // TODO: Implement storagePath() method.
    }

    public function environment(...$environments)
    {
        // TODO: Implement environment() method.
    }

    public function runningInConsole()
    {
        // TODO: Implement runningInConsole() method.
    }

    public function runningUnitTests()
    {
        // TODO: Implement runningUnitTests() method.
    }

    public function isDownForMaintenance()
    {
        // TODO: Implement isDownForMaintenance() method.
    }

    public function registerConfiguredProviders()
    {
        // TODO: Implement registerConfiguredProviders() method.
    }

    public function register($provider, $force = false)
    {
        // TODO: Implement register() method.
    }

    public function registerDeferredProvider($provider, $service = null)
    {
        // TODO: Implement registerDeferredProvider() method.
    }

    public function resolveProvider($provider)
    {
        // TODO: Implement resolveProvider() method.
    }

    public function boot()
    {
        // TODO: Implement boot() method.
    }

    public function booting($callback)
    {
        // TODO: Implement booting() method.
    }

    public function booted($callback)
    {
        // TODO: Implement booted() method.
    }

    public function bootstrapWith(array $bootstrappers)
    {
        // TODO: Implement bootstrapWith() method.
    }

    public function getLocale()
    {
        // TODO: Implement getLocale() method.
    }

    public function getNamespace()
    {
        // TODO: Implement getNamespace() method.
    }

    public function getProviders($provider)
    {
        // TODO: Implement getProviders() method.
    }

    public function hasBeenBootstrapped()
    {
        // TODO: Implement hasBeenBootstrapped() method.
    }

    public function loadDeferredProviders()
    {
        // TODO: Implement loadDeferredProviders() method.
    }

    public function setLocale($locale)
    {
        // TODO: Implement setLocale() method.
    }

    public function shouldSkipMiddleware()
    {
        // TODO: Implement shouldSkipMiddleware() method.
    }

    public function terminate()
    {
        // TODO: Implement terminate() method.
    }
}
