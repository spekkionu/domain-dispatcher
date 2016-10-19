<?php
namespace Spekkionu\DomainDispatcher;

use League\Container\ContainerInterface;

class Dispatcher
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Dispatcher constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Dispatches command
     *
     * @param mixed $command The command to dispatch.  Can be a callable or object with a handle method.
     * @param array $args Array of arguments to pass to the command
     *
     * @return mixed
     * @throws \Interop\Container\Exception\ContainerException
     * @throws \InvalidArgumentException
     */
    public function dispatch($command, array $args = [])
    {
        if (is_callable($command)) {
            return call_user_func($command);
        }
        if (is_string($command)) {
            $command = $this->container->get($command);
        }
        if (!method_exists($command, 'handle')) {
            throw new \InvalidArgumentException('Command must be a callable or implement a handle method.');
        }
        return $this->container->call([$command, 'handle'], $args);
    }
}
