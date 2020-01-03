<?php

namespace Palmans\LaravelOpenFoodFacts;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Collection;
use InvalidArgumentException;

class OpenFoodFacts extends OpenFoodFactsApiWrapper
{
    protected $max_results;

    public function __construct(Container $app)
    {
        parent::__construct([
            'geography' =>  $app['config']->get('openfoodfacts.geography'),
            'app' =>  $app['config']->get('app.name'),
        ], $app['cache.store']);

        $this->max_results = $app['config']->get('openfoodfacts.max_results', 1000);
    }

    public function barcode($value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException("Argument must represent a barcode");
        }

        return $this->api->getProduct($value);
    }

    public function find($searchterm)
    {
        if (empty($searchterm)) {
            throw new InvalidArgumentException("Specify a search term to find data for matching products");
        }

        $products = Collection::make();
        $page = 0;

        do {
            $pageResults = $this->api->search($searchterm, ++$page, 100);
            $totalMatches = $pageResults->searchCount();

            if ($this->max_results > 0 && $totalMatches > $this->max_results) {
                throw new \Exception("ERROR: {$totalMatches} results found, while buffer limited to {$this->max_results}. Please narrow your search.");
            }

            $pages = (int)ceil($totalMatches / $pageResults->getPageSize());

            $products = $products->concat(iterator_to_array($pageResults));

        } while ($page < $pages);

        return $products;
    }

    public function __call($method, $parameters)
    {
        return $this->api->$method(...$parameters);
    }
}
