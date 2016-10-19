<?php
namespace Spekkionu\DomainDispatcher\Test\Commands;

class InvokableCommand
{
    public function __invoke()
    {
        return true;
    }
}
