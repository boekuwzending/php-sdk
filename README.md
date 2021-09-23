# Boekuwzending.com API client for PHP

<p align="center">
    <img src="https://boekuwzending.nl/wp-content/uploads/2019/05/logo_slider_mobile.png" />
</p>

A PHP library for communicating with the Boekuwzending.com API. 

## Requirements
* A Boekuwzending.com account, [create one here](https://mijn.boekuwzending.com/registreren/)
* API credentials, [send us an email](mailto:mail@boekuwzending.com)
* PHP 7.1 or higher

[![Build Status](https://travis-ci.org/boekuwzending/php-sdk.svg?branch=master)](https://travis-ci.org/boekuwzending/php-sdk)
[![Test Coverage](https://api.codeclimate.com/v1/badges/bc6b5be52ab55f944738/test_coverage)](https://codeclimate.com/github/boekuwzending/php-sdk/test_coverage)

## Composer installation
Install the API client using [Composer](http://getcomposer.org/doc/00-intro.md). 

    $ composer require boekuwzending/php-sdk

## Getting started
Creating the client:

```php
$client = Boekuwzending\ClientFactory::build('Your API client ID', 'Your API client Secret');
```

Asking the API for tracking for a specific shipment:

```php
$client->trackAndTrace->get('c45db117-4b06-43d4-ac5f-11afce96a168');
```
