# Stockholm Pulic Transport

[![Build Status](https://travis-ci.org/risan/sl.svg?branch=master)](https://travis-ci.org/risan/sl)
[![HHVM Status](http://hhvm.h4cc.de/badge/risan/sl.svg?style=flat)](http://hhvm.h4cc.de/package/risan/sl)
[![StyleCI](https://styleci.io/repos/48139068/shield?style=flat)](https://styleci.io/repos/48139068)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/risan/sl/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/risan/sl/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/risan/sl/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/risan/sl/?branch=master)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/0363c9d1-17ec-475c-bef4-9d7e889d77b3.svg)](https://insight.sensiolabs.com/projects/0363c9d1-17ec-475c-bef4-9d7e889d77b3)
[![Latest Stable Version](https://poser.pugx.org/risan/sl/v/stable)](https://packagist.org/packages/risan/sl)
[![License](https://poser.pugx.org/risan/sl/license)](https://packagist.org/packages/risan/sl)

PHP HTTP client library for communicating with [sl.se](http://sl.se/)—a Stockholm public transportation website.

## Table of Contents

* [Dependencies](#dependencies)
* [Installation](#installation)
* [Basic Usage](#basic-usage)
* [Search for Station](#search-for-station)
* [Find Departures](#find-departures)
  * [Bus Departures](#bus-departures)
  * [Train Departures](#train-departures)
  * [Metro Departures](#metro-departures)
  * [Tram Departures](#tram-departures)
  * [Light Rail Departures](#light-rail-departures)
  * [Ship Departures](#ship-departures)

## Dependencies

This package relies on the following libraries to work:

* [Guzzle](https://github.com/guzzle/guzzle)
* [Illuminate Support](https://github.com/illuminate/support)

All above dependencies will be automatically downloaded if you are using [Composer](https://getcomposer.org/) to install this package.

## Installation

To install this library using [Composer](https://getcomposer.org/), simply run the following command inside your project directory:

```bash
composer require risan/sl
```

Or you may also add `risan\sl` package into your `composer.json` file like so:

```bash
"require": {
  "risan/sl": "~1.1"
}
```

And don't forget to run the following composer command to install this library:

```bash
composer install
```

## Basic Usage

Here is some basic example to use this library:

```php
<?php
// Include autoloder file.
require 'vendor/autoload.php';

// Create a new instance Sl\Sl.
$sl = new Sl\Sl();

// Search for station.
// Will return Sl\Collections\StationColection.
$stations = $sl->searchStation('Central Station');

// Find for departures.
// Will return Sl\Collections\DepartureColection.
$departures = $sl->departuresFrom($stations->first());
```

## Search for Station

To search for a station, you may use the `searchStation()` method:

```php
$sl->searchStation(string $query);
```

For example, if you'd like to find all stations that match the `central` word, then your code will look like this:

```php
$sl = new Sl\Sl();

$stations = $sl->searchStation('central');

print_r($stations->toArray());
```

The `searchStation()` method will automatically perform a HTTP request to [sl.se](http://sl.se/) to search for stations that match the given `$query`. This method will return an instance of `Sl\Collections\StationCollection` class, which contains a collection of `Sl\Station` instances.

The `StationCollection` class itself is a subclass of `Illuminate\Support\Collection`, so you may leverage the powerful feature of [Laravel's collection](http://laravel.com/docs/5.1).

## Find Departures

You may also find departures from a specific station using `departuresFrom()` method:

```php
$sl->departuresFrom(Sl\Station $station);
```

This method will perform a HTTP request to [sl.se](http://sl.se/) website in order to find a list of departures for a given `$station`. Note that this method requires an argument that must be instance of `Sl\Station` class.

For example, if you need to find all departures from `Slussen` station, you can do the following:

```php
$sl = new Sl\Sl();

$slussen = $sl->searchStation('slussen')->first();

$departures = $sl->departuresFrom($slussen);

print_r($departures->toArray());
```

The `$departures` will be an instance of `Sl\Collections\DepartureCollection` which hold a collection of `Sl\Departure` instances. The `DepartureCollection` is also a subclass of `Illuminate\Support\Collection`.

### Bus Departures

To filter only the bus departures, call `busses` method:

```php
$sl->departuresFrom(Sl\Station $station)->busses();
```

### Train Departures

To filter only the train (pendeltåg) departures, call `trains()` method:

```php
$sl->departuresFrom(Sl\Station $station)->trains();
```

### Metro Departures

To filter only the metro (tunnelbana) departures, call `metros()` method:

```php
$sl->departuresFrom(Sl\Station $station)->metros();
```

### Tram Departures

To filter only the tram (spårvagn) departures, call `trams()` method:

```php
$sl->departuresFrom(Sl\Station $station)->metros();
```

### Light Rail Departures

To filter only the light rail (lokalbana) departures, call `lightRails()` method:

```php
$sl->departuresFrom(Sl\Station $station)->lightRails();
```

### Ship Departures

To filter only the ship or boat departures, call `ships()` method:

```php
$sl->departuresFrom(Sl\Station $station)->ships();
```
