# Domain Dispatcher

[![Latest Stable Version](https://poser.pugx.org/spekkionu/domain-dispatcher/v/stable.png)](https://packagist.org/packages/spekkionu/domain-dispatcher)
[![Build Status](https://travis-ci.org/spekkionu/domain-dispatcher.svg?branch=master)](https://travis-ci.org/spekkionu/domain-dispatcher)
[![Code Coverage](https://scrutinizer-ci.com/g/spekkionu/domain-dispatcher/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/spekkionu/domain-dispatcher/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/spekkionu/domain-dispatcher/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/spekkionu/domain-dispatcher/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/af8967e2-5231-43d2-aab9-28075071ca88/mini.png)](https://insight.sensiolabs.com/projects/af8967e2-5231-43d2-aab9-28075071ca88)

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
$container = new \League\Container\Container();
$container->delegate(
    new \League\Container\ReflectionContainer
);
$dispatcher = $container->get('Spekkionu\DomainDispatcher\Dispatcher');
$command = new MyCommand($var1, $var2);
$dispatcher->dispatch($command);
```

## Writing a command

``` php
class MyCommand
{
    /**
     * @var User
     */
    private $user;
    
    /**
     * You can add any arguments you need to the constructor
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    /**
     * The command must have a handle method.
     * Any dependencies for the handle method will be automatically resolved by the container
     * Whatever you return here will be returned by the dispatch call
     */
    public function handle(EmailSender $mailer, Logger $logger)
    {
        // Your code goes here
        $result = $mailer->sendWelcomeEmail($user);
        $logger->log('Welcome email sent to user');
        
        return $result;
    }
}
```

``` php
$user = new User();
$user->name = 'Bob';
$user->email = 'email@example.com';

$command = new MyCommand($user);
$result = $dispatcher->dispatch($command);

```

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

