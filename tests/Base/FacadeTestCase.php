<?php

namespace Palmans\LaravelOpenFoodFacts\Tests\Base;

use Orchestra\Testbench\TestCase;
use Palmans\LaravelOpenFoodFacts\OpenFoodFactsServiceProvider;

abstract class FacadeTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [OpenFoodFactsServiceProvider::class];
    }
}
