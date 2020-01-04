<?php

namespace Palmans\LaravelOpenFoodFacts\Tests;

use Palmans\LaravelOpenFoodFacts\Facades\OpenFoodFacts;

class FacadeBridgeToApiTest extends Base\FacadeTestCase
{
    /** @test */
    public function it_calls_method_on_vendor_apiclass()
    {
        $doc = OpenFoodFacts::getProduct('0737628064502');

        $this->assertInstanceOf(\OpenFoodFacts\Document::class, $doc);
    }
}
