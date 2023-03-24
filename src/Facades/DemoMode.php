<?php

namespace Lpfuri\LaravelDemoMode\Facades;

use Illuminate\Support\Facades\Facade;

class DemoMode extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'DemoMode';
    }
}