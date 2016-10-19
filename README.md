# Domain Dispatcher

[![Latest Stable Version](https://poser.pugx.org/spekkionu/domain-dispatcher/v/stable.png)](https://packagist.org/packages/spekkionu/domain-dispatcher)
[![Build Status](https://travis-ci.org/spekkionu/domain-dispatcher.svg?branch=master)](https://travis-ci.org/spekkionu/domain-dispatcher)
[![Code Coverage](https://scrutinizer-ci.com/g/spekkionu/domain-dispatcher/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/spekkionu/domain-dispatcher/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/spekkionu/domain-dispatcher/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/spekkionu/domain-dispatcher/?branch=master)
[![Total Downloads](https://poser.pugx.org/spekkionu/domain-dispatcher/downloads.png)](https://packagist.org/packages/spekkionu/domain-dispatcher)

Command dispatcher that integrates with [league/container](http://container.thephpleague.com/).  

## Install

Via Composer

``` bash
$ composer require spekkionu/domain-dispatcher
```

## Usage

You must first register the service provider in your league/container instance.

``` php
$container->addServiceProvider('Spekkionu\DomainDispatcher\DispatcherServiceProvider');
``` 

Then you can use the dispatcher by pulling it out of the container.

``` php
/** League\Container $container */
$dispatcher = $container->get('Spekkionu\DomainDispatcher\Dispatcher');
$command = new MyCommand($var1, $var2);
$dispatcher->dispatch($command);
```

## Writing a command



## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

