# Stockholm Pulic Transport

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
  "risan/sl": "*"
}
```

Then don't forget to run the following command to install this library:

```bash
composer install
```

## Basic Usage

Here is some basic example about how to use this library:

```php
<?php
// Include autoloder file.
require 'vendor/autoload.php';

// Create a new instance Sl\Sl.
$sl = new Sl\Sl();

// Search for station.
// @return Sl\Collections\StationColection.
$stations = $sl->searchStation('Central Station');

// Find for departures.
// @return Sl\Collections\DepartureColection.
$departures = $sl->departuresFrom($stations->first());
```

## Search for Station

To search for station, you may use the `searchStation()` method:

```php
$sl->searchStation(string $query);
```

This method will perform a request to [sl.se](http://sl.se/) to search for a station that match the given `$query`. The return type is an instance of `Sl\Collections\StationCollection`, which is a collection of `Sl\Station` instances.

The `StationCollection` itself is a subclass of `Illuminate\Support\Collection`, so you may leverage the powerful feature of [Laravel's collection](http://laravel.com/docs/5.1).

## Find Departures

To find departures, you may use the `departuresFrom()` method:

```php
$sl->departuresFrom(Sl\Station $station);
```

This method will perform a request to [sl.se](http://sl.se/) to find a list of departures for a given `$station`. Note that method argument must be instance of `Sl\Station` class.

This method will return an instance of `Sl\Collections\DepartureCollection` which is a collection of `Sl\Departure` instances. The `DepartureCollection` is also a subclass of `Illuminate\Support\Collection`.

### Bus Departures

You may only list the bus departures, by calling `busses()` method on `DepartureCollection` instance.

```php
$sl->departuresFrom(Sl\Station $station)->busses();
```

### Train Departures

You may only list the train (pendeltåg) departures, by calling `trains()` method on `DepartureCollection` instance.

```php
$sl->departuresFrom(Sl\Station $station)->trains();
```

### Metro Departures

You may only list the metro (tunnelbana) departures, by calling `metros()` method on `DepartureCollection` instance.

```php
$sl->departuresFrom(Sl\Station $station)->metros();
```

### Tram Departures

You may only list the tram (spårvagn) departures, by calling `trams()` method on `DepartureCollection` instance.

```php
$sl->departuresFrom(Sl\Station $station)->metros();
```

### Light Rail Departures

You may only list the light rail (lokalbana) departures, by calling `lightRails()` method on `DepartureCollection` instance.

```php
$sl->departuresFrom(Sl\Station $station)->lightRails();
```

### Ship Departures

You may only list the ship or boat departures, by calling `ships()` method on `DepartureCollection` instance.

```php
$sl->departuresFrom(Sl\Station $station)->ships();
```
