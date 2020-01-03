<?php

namespace Palmans\LaravelOpenFoodFacts;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Palmans\LaravelOpenFoodFacts\Skeleton\SkeletonClass
 */
class OpenFoodFactsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'openfoodfacts';
    }
}
