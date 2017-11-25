[![Latest Stable Version](https://poser.pugx.org/aviator/array-fold/v/stable)](https://packagist.org/packages/aviator/array-fold)
[![License](https://poser.pugx.org/aviator/array-fold/license)](https://packagist.org/packages/aviator/array-fold)
[![Build Status](https://travis-ci.org/danielsdeboer/array-fold.svg?branch=master)](https://travis-ci.org/danielsdeboer/array-fold)

## Overview

`array_fold()` takes an multidimensional array of any depth and recursively folds each level into the previous, flattening it to a single level.

By default it preserves (and overwrites) keys, though this can be disabled with the optional second parameter.

## Installation

Via Composer:
```
composer require aviator/array-fold
```

## Testing

Via Composer:
```
composer test
```

## Usage

```php
$array = [
    'level1' [
        'some' => 'value',
        'someOther' => 'value',
        'level2' => [
            'someOther' => 'value'
        ]
    ]
];

// Using keys
echo array_fold($array);

/*
 [
    'some' => 'value',
    'someOther' => 'value',
 ]
*/

// Ignoring keys
echo array_fold($array, false);

/*
 [
    'value',
    'value',
    'value',
 ]
*/
```

## Other

### License

This package is licensed with the [MIT License (MIT)](LICENSE.md).