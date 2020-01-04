<?php

namespace Palmans\LaravelOpenFoodFacts\Tests;

use Orchestra\Testbench\TestCase;
use Palmans\LaravelOpenFoodFacts\Facades\OpenFoodFacts;

class BarcodeFindTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [\Palmans\LaravelOpenFoodFacts\OpenFoodFactsServiceProvider::class];
    }

    /** @test */
    public function it_returns_a_document_when_product_found()
    {
        $doc = OpenFoodFacts::barcode('0737628064502');

        $this->assertInstanceOf(\OpenFoodFacts\Document::class, $doc);
    }

    /** @test */
    public function it_returns_null_when_product_not_found()
    {
        $doc = OpenFoodFacts::barcode('this-barcode-does-not-exist');

        $this->assertNull($doc);
    }

    /** @test */
    public function it_throws_an_exception_when_argument_empty()
    {
        $this->expectException("InvalidArgumentException");
        $this->expectExceptionMessage("Argument must represent a barcode");

        OpenFoodFacts::barcode('');
    }
}
