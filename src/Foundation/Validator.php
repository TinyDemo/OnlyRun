<?php

namespace App\Foundation;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

class Validator
{
    private function __construct()
    {
    }

    /**
     * @return Factory
     */
    public static function getInstance()
    {
        $langPath = __DIR__.'/../../resources/lang';
        $fileLoader = new FileLoader(new Filesystem(), $langPath);
        $translator = new Translator($fileLoader, 'en');

        return new Factory($translator);
    }
}
