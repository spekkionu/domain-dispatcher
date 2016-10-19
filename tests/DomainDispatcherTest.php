<?php
namespace Spekkionu\DomainDispatcher\Test;

use League\Container\Container;
use Spekkionu\DomainDispatcher\Dispatcher;
use Spekkionu\DomainDispatcher\DispatcherServiceProvider;
use Spekkionu\DomainDispatcher\Test\Commands\CommandWithDependency;
use Spekkionu\DomainDispatcher\Test\Commands\InvokableCommand;

class DomainDispatcherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * @var Container
     */
    private $container;

    public function setUp()
    {
        $this->container = new Container();
        $this->container->delegate(
            new \League\Container\ReflectionContainer
        );
        $this->container->addServiceProvider(new DispatcherServiceProvider());
        $this->dispatcher = $this->container->get('Spekkionu\DomainDispatcher\Dispatcher');
    }

    /**
     * Test dispatching using anonymous function
     */
    public function test_dispatching_closure()
    {
        $function = function () {
            return true;
        };
        $result = $this->dispatcher->dispatch($function);
        $this->assertTrue($result);
    }

    /**
     * Test dispatching using class with invoke method
     */
    public function test_dispatching_invokable_class()
    {
        $command = new InvokableCommand();
        $result = $this->dispatcher->dispatch($command);
        $this->assertTrue($result);
    }

    /**
     * Test dispatching command class
     */
    public function test_dispatching_command_class()
    {
        $command = $this->getMockBuilder('MyCommand')->setMethods(['handle'])->getMock();
        $command->expects($this->once())->method('handle')->willReturn(true);
        $result = $this->dispatcher->dispatch($command);
        $this->assertTrue($result);
    }

    /**
     * Test that dependencies are injected by the container
     */
    public function test_injection_of_dependencies()
    {
        $now = new \DateTime();
        $this->container->add('DateTime', $now);
        $command = new CommandWithDependency();
        $result = $this->dispatcher->dispatch($command);
        $this->assertSame($now, $result);
    }

    /**
     * Test that extra arguments are passed to the handle method
     */
    public function test_passing_extra_arguments()
    {
        $now = new \DateTime();
        $command = new CommandWithDependency();
        $result = $this->dispatcher->dispatch($command, ['date' => $now]);
        $this->assertSame($now, $result);
    }

    /**
     * Test creation of the command from container
     */
    public function test_creating_command_from_container()
    {
        $now = new \DateTime();
        $this->container->add('DateTime', $now);
        $command = 'Spekkionu\DomainDispatcher\Test\Commands\CommandWithConstructor';
        $result = $this->dispatcher->dispatch($command);
        $this->assertSame($now, $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Command must be a callable or implement a handle method.
     */
    public function test_object_without_handle_method()
    {
        $now = new \DateTime();
        $this->dispatcher->dispatch($now);
    }
}
