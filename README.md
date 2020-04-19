# Log sent emails to database

[![Latest Version on Packagist](https://img.shields.io/packagist/v/teachiq/laravel-email-logger.svg?style=flat-square)](https://packagist.org/packages/teachiq/laravel-email-logger)

Log all emails your application sends, to track the most frequest emails, common recipients, to debug etc.

## Installation

You can install the package via composer:

```bash
composer require teachiq/laravel-email-logger
```

## Usage

The package auto-registers, all you have to do is run the migrations to add the necessary database table (`email_logs`).

### Testing

``` bash
composer test
```

### Roadmap
 * Logging more interesting information (sunch as Mailable class, user, etc.)
 * Adding a simple dashboard or API to fetch data, for instance most common mailable etc.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email martin.krisell@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).