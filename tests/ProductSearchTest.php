<?php

namespace Palmans\LaravelOpenFoodFacts\Tests;

use OpenFoodFacts\Document;
use Palmans\LaravelOpenFoodFacts\Facades\OpenFoodFacts;

class ProductSearchTest extends Base\FacadeTestCase
{
    /** @test */
    public function it_returns_a_laravelcollection_with_documents()
    {
        $results = OpenFoodFacts::find('Stir-Fry Rice Noodles');

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $results);

        $this->assertTrue($results->isNotEmpty());

        $results->each(function($doc) {
            $this->assertInstanceOf(\OpenFoodFacts\Document::class, $doc);
        });
    }

    /** @test */
    public function it_returns_an_empty_laravelcollection_when_no_results_found()
    {
        $results = OpenFoodFacts::find('no-such-product-exists');

        $this->assertTrue($results->isEmpty());
    }

    /** @test */
    public function it_throws_an_exception_on_too_many_results()
    {
        $this->expectException("Exception");

        OpenFoodFacts::find('cola');
    }

    /** @test */
    public function it_throws_an_exception_when_argument_empty()
    {
        $this->expectException("InvalidArgumentException");
        $this->expectExceptionMessage("Specify a search term to find data for matching products");

        OpenFoodFacts::find('');
    }
}
