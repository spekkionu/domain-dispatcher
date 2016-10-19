# domain-dispatcher

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

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

[ico-version]: https://img.shields.io/packagist/v/spekkionu/domain-dispatcher.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/spekkionu/domain-dispatcher/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/spekkionu/domain-dispatcher.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/spekkionu/domain-dispatcher.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/spekkionu/domain-dispatcher.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/spekkionu/domain-dispatcher
[link-travis]: https://travis-ci.org/spekkionu/domain-dispatcher
[link-scrutinizer]: https://scrutinizer-ci.com/g/spekkionu/domain-dispatcher/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/spekkionu/domain-dispatcher
[link-downloads]: https://packagist.org/packages/spekkionu/domain-dispatcher
[link-author]: https://github.com/spekkionu
[link-contributors]: ../../contributors
