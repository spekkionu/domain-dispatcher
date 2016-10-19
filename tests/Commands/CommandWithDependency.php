<?php
namespace Spekkionu\DomainDispatcher\Test\Commands;

class CommandWithDependency
{
    /**
     * @param \DateTime $date
     * @return \DateTime
     */
    public function handle(\DateTime $date)
    {
        return $date;
    }
}
