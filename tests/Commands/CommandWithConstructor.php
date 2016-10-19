<?php
namespace Spekkionu\DomainDispatcher\Test\Commands;

class CommandWithConstructor
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * CommandWithConstructor constructor.
     * @param \DateTime $date
     */
    public function __construct(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return \DateTime
     */
    public function handle()
    {
        return $this->date;
    }
}
