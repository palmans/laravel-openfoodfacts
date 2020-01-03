<?php

namespace Palmans\LaravelOpenFoodFacts\Facades;

use Illuminate\Support\Facades\Facade;

class OpenFoodFacts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'openfoodfacts';
    }
}
