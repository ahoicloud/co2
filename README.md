# This package for laravel calculates Co2 emission for data

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ahoicloud/co2.svg?style=flat-square)](https://packagist.org/packages/ahoicloud/co2)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ahoicloud/co2/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ahoicloud/co2/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ahoicloud/co2/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ahoicloud/co2/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ahoicloud/co2.svg?style=flat-square)](https://packagist.org/packages/ahoicloud/co2)

Every byte of data that’s uploaded or downloaded produces CO2. By being able to calculate these emissions, developers can enabled themself and their users to create more efficient, lower carbon decisions. Here are a few examples:
+ Create a carbon budget for your site
+ Inform the user when they uploading or downloading carbon intensive files


The package uses the yearly average grid intensity data from [Ember](https://ember-climate.org/data/data-explorer/), as well as marginal intensity data from the [UNFCCC](https://unfccc.int/) (United Nations Framework Convention on Climate Change).

The package is build for Laravel and heavy inspired by [thegreenwebfoundation/co2.js](https://github.com/thegreenwebfoundation/co2.js)



## Installation

You can install the package via composer:

```bash
composer require ahoicloud/co2
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="co2-config"
```

This is the contents of the published config file:

```php
return [

    'KWH_PER_GB' => 0.81,
    'END_USER_DEVICE_ENERGY' => 0.52,
    'NETWORK_ENERGY' => 0.14,
    'DATACENTER_ENERGY' => 0.15,
    'PRODUCTION_ENERGY' => 0.19,
    'GLOBAL_GRID_INTENSITY' => 442,
    'RENEWABLES_GRID_INTENSITY' => 50,
    'FIRST_TIME_VIEWING_PERCENTAGE' => 0.75,
    'RETURNING_VISITOR_PERCENTAGE' => 0.25,
    'PERCENTAGE_OF_DATA_LOADED_ON_SUBSEQUENT_LOAD' => 0.02,

];
```


## Usage

```php
$co2 = new Ahoicloud\Co2();
echo $co2->energyPerByteByComponent($byte);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Arne Breitsprecher](https://github.com/ahoicloud)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

The code for [thegreenwebfoundation/co2.js](https://github.com/thegreenwebfoundation/co2.js) is licensed Apache 2.0. ([What does this mean?](https://tldrlegal.com/license/apache-license-2.0-(apache-2.0)))

The average carbon intensity data from Ember is published under the Creative Commons ShareAlike Attribution Licence ([CC BY-SA 4.0](https://creativecommons.org/licenses/by-sa/4.0/)). ([What does this mean?](https://tldrlegal.com/license/creative-commons-attribution-sharealike-4.0-international-(cc-by-sa-4.0)))

The marginal intensity data is published by the Green Web Foundation, under the Creative Commons ShareAlike Attribution Licence ([CC BY-SA 4.0](https://creativecommons.org/licenses/by-sa/4.0/)). ([What does this mean?](https://tldrlegal.com/license/creative-commons-attribution-sharealike-4.0-international-(cc-by-sa-4.0)))

See LICENCE for more.
