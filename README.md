# This packge calculates co2 per byte

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ahoicloud/co2.svg?style=flat-square)](https://packagist.org/packages/ahoicloud/co2)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ahoicloud/co2/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ahoicloud/co2/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ahoicloud/co2/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ahoicloud/co2/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ahoicloud/co2.svg?style=flat-square)](https://packagist.org/packages/ahoicloud/co2)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.



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
