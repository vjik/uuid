# UUID Helper

[![Latest Stable Version](https://poser.pugx.org/vjik/uuid/v/stable.png)](https://packagist.org/packages/vjik/uuid)
[![Total Downloads](https://poser.pugx.org/vjik/uuid/downloads.png)](https://packagist.org/packages/vjik/uuid)
[![Build status](https://github.com/vjik/uuid/workflows/build/badge.svg)](https://github.com/vjik/uuid/actions?query=workflow%3Abuild)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fvjik%2Fuuid%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/vjik/uuid/master)
[![static analysis](https://github.com/vjik/uuid/workflows/static%20analysis/badge.svg)](https://github.com/vjik/uuid/actions?query=workflow%3A%22static+analysis%22)

The package provides `UuidHelper` that has static methods to work with UUID.
Based on library [ramsey/uuid](https://uuid.ramsey.dev/).

## Installation

The package could be installed with [composer](https://getcomposer.org/download/):

```shell
composer require vjik/uuid --prefer-dist
```

## `UuidHelper` usage

`UuidHelper` methods are static so usage is like the following:

```php
$bytes = \Vjik\Uuid\UuidHelper::convertStringToBytes('1f2d3897-a226-4eec-bd2c-d0145ef25df9');
```

Overall the helper has the following methods:

- generateTimestampFirstCombUuid4
- convertStringToBytes
- convertBytesToString

## Testing

### Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```shell
./vendor/bin/phpunit
```

### Mutation testing

The package tests are checked with [Infection](https://infection.github.io/) mutation framework with
[Infection Static Analysis Plugin](https://github.com/Roave/infection-static-analysis-plugin). To run it:

```shell
./vendor/bin/roave-infection-static-analysis-plugin
```

### Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/). To run static analysis:

```shell
./vendor/bin/psalm
```

## License

The UUID Helper is free software. It is released under the terms of the BSD License.
Please see [`LICENSE`](./LICENSE.md) for more information.
