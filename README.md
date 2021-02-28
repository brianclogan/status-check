# Status/Admin Checks in Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/darkgoldblade01/status-check.svg?style=flat-square)](https://packagist.org/packages/darkgoldblade01/status-check)
[![Build Status](https://img.shields.io/travis/darkgoldblade01/status-check/master.svg?style=flat-square)](https://travis-ci.org/darkgoldblade01/status-check)
[![Quality Score](https://img.shields.io/scrutinizer/g/darkgoldblade01/status-check.svg?style=flat-square)](https://scrutinizer-ci.com/g/darkgoldblade01/status-check)
[![Total Downloads](https://img.shields.io/packagist/dt/darkgoldblade01/status-check.svg?style=flat-square)](https://packagist.org/packages/darkgoldblade01/status-check)

A basic package to handle checking different things in Laravel, and reporting on them.

 - Admin Login Check - Handles logging all logins (only logs time, and user id) automatically
 - Disk Space Check - Checks for free disk space and total disk space, by default passing is 50% free or higher, partial is 10%-49%, and less than 10% is failed.
 - HTTP Status Check - Checks to see if the front page of your site is responding with a 200 status code. Option in the config to save the response body, by default it is disabled.
 - SSL Checker - Checks the SSL status on your application, reports on expiration date, whether it's secure, and more.

## Installation

You can install the package via composer:

```bash
composer require darkgoldblade01/status-check
```

Publish the config file:
```bash
php artisan vendor:publish --provider="Darkgoldblade01\StatusCheck\StatusCheckServiceProvider"
```

Migrate the database:
```bash
php artisan migrate
```

## Usage
The base package has built in checks for a few key elements. If you would like to create your own checks, you can by just extending the `Darkgoldblade01\StatusCheck\Classes\Checker` class:
``` php
<?php

namespace App\Checks;

use Darkgoldblade01\StatusCheck\Classes\Checker;

/**
 * Class NewChecker
 */
class NewChecker extends Checker
{

    public string $name = 'New Check';

    public function handle(): array
    {
    
        //Required Response
        return [
            'status' => 'passed|partial|failed',
            'results' => string|array|object|int|boolean,
        ];
    }

}
```

Once created, just add them to the `status-check.php` config file under the `checks`.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email brianldj@gmail.com instead of using the issue tracker.

## Credits

- [Brian Logan](https://github.com/darkgoldblade01)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).