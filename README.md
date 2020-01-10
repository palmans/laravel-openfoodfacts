# Laravel Open Food Facts API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/palmans/laravel-openfoodfacts.svg?style=flat-square)](https://packagist.org/packages/palmans/laravel-openfoodfacts)
[![Build Status](https://img.shields.io/travis/palmans/laravel-openfoodfacts/master.svg?style=flat-square)](https://travis-ci.org/palmans/laravel-openfoodfacts)
[![Code Coverage](https://scrutinizer-ci.com/g/palmans/laravel-openfoodfacts/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/palmans/laravel-openfoodfacts/?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/palmans/laravel-openfoodfacts.svg?style=flat-square)](https://scrutinizer-ci.com/g/palmans/laravel-openfoodfacts)

This package provides a convenient wrapper to the [Open Food Facts API](https://en.wiki.openfoodfacts.org/API) for Laravel applications (5.7+).

## Installation

You can install the package via composer:

```bash
composer require palmans/laravel-openfoodfacts
```

## Usage

#### Find product details by barcode
``` php
OpenFoodFacts::barcode('20203467');
```
it returns an array with product details:
```
Array
(
    [product_name] => Cantuccini with hazelnuts
    [image_url] => https://static.openfoodfacts.org/images/products/20203467/front_fr.4.400.jpg
    ...    
)    
```

#### Find products that match a search term:
``` php
$collection = OpenFoodFacts::find('Coca Cola Zero');

//returns a Illuminate\Support\Collection of arrays with details of each product found
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.