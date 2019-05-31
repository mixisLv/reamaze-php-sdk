# Reamaze PHP SDK

[![Project Status: Active – The project has reached a stable, usable state and is being actively developed.](https://www.repostatus.org/badges/latest/active.svg)](https://www.repostatus.org/#active)
[![GitHub license](https://img.shields.io/github/license/mixisLv/reamaze-php-sdk.svg)](https://github.com/mixisLv/reamaze-php-sdk/blob/master/LICENSE)
[![GitHub release](https://img.shields.io/github/release/mixisLv/reamaze-php-sdk.svg)](https://github.com/mixisLv/reamaze-php-sdk/releases/latest)
[![Build Status](https://travis-ci.org/mixisLv/reamaze-php-sdk.svg?branch=master)](https://travis-ci.org/mixisLv/reamaze-php-sdk)

## A PHP client library for accessing Reamaze API

This PHP library allows you to easily integrate Reamaze with PHP.

## Requirements

The following PHP extension is required:

* json
* curl

## Installation

Run the following to include this via [Composer](https://packagist.org/packages/mixislv/reamaze-php-sdk)

    composer require "mixislv/reamaze-php-sdk" "^2.0"

Or by adding the following to your composer.json:

    "require": {
        "mixislv/reamaze-php-sdk": "^2.0"
    }

## Usage

```php
use mixisLv\Reamaze\Api as ReamazeApi;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Articles\GetParams;

$reamaze = new ReamazeApi(REAMAZE_BRAND, REAMAZE_LOGIN, REAMAZE_TOKEN);

try {
    $response = $reamaze->articles->get(new GetParams(['slug' => 'test']));
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
```

Check out [examples](./examples) directory for more usage examples.
