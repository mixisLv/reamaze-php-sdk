# Reamaze PHP SDK

[![Project Status: WIP - Initial development is in progress, but there has not yet been a stable, usable release suitable for the public.](http://www.repostatus.org/badges/latest/wip.svg)](http://www.repostatus.org/#wip)
[![GitHub license](https://img.shields.io/github/license/mixisLv/reamaze-php-sdk.svg)](https://github.com/mixisLv/reamaze-php-sdk/blob/master/LICENSE)
[![GitHub release](https://img.shields.io/github/release/mixisLv/reamaze-php-sdk.svg)]()


## A PHP client library for accessing Reamaze API

This PHP library allows you to easily integrate Reamaze with PHP.

## Requirements

The following PHP extension is required:

* json
* curl

## Installation

Run the following to include this via Composer

    composer require "mixislv/reamaze-php-sdk" "2.0.*"

Or by adding the following to your composer.json:

    "require": {
        "mixislv/reamaze-php-sdk": "2.0.*"
    }

## Usage

```php
use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Articles\GetParams;

$reamaze = new Api(REAMAZE_BRAND, REAMAZE_LOGIN, REAMAZE_TOKEN);

try {
    $response = $reamaze->articles->get(new GetParams(['slug' => 'test']));
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
```

Check out [examples](./examples) directory for more usage examples.
