# Laravel Open Food Facts API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/palmans/laravel-openfoodfacts.svg?style=flat-square)](https://packagist.org/packages/palmans/laravel-openfoodfacts)
[![Build Status](https://img.shields.io/travis/palmans/laravel-openfoodfacts/master.svg?style=flat-square)](https://travis-ci.org/palmans/laravel-openfoodfacts)

This package provides a convenient wrapper to the [Open Food Facts API](https://en.wiki.openfoodfacts.org/API) for Laravel applications (5.7+).

## Installation

You can install the package via composer:

```bash
composer require palmans/laravel-openfoodfacts
```

## Usage
Find product details by barcode
``` php
OpenFoodFacts::barcode('20203467');
```
... or directly retrieve a specific attribute:
``` php
OpenFoodFacts::barcode('20203467')->product_name; // 'Cantuccini with hazelnuts'
OpenFoodFacts::barcode('20203467')->image_url; // 'https://static.openfoodfacts.org/images/products/20203467/front_fr.4.400.jpg'
```

Find products that match a search term:
``` php
$collection = OpenFoodFacts::find('Coca Cola Zero');

//returns a Illuminate\Support\Collection with details of each product found
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email eddie@palmans.nl instead of using the issue tracker.

## Credits

- [Eddie Palmans](https://github.com/palmans)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.