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

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="co2-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="co2-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="co2-views"
```

## Usage

```php
$co2 = new Ahoicloud\Co2();
echo $co2->echoPhrase('Hello, Ahoicloud!');
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
