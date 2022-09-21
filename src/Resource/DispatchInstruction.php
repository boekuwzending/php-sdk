<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

use Boekuwzending\Exception\InvalidResourceArgumentException;
use DateTimeInterface;

/**
 * Class DispatchInstruction.
 */
class DispatchInstruction extends Instruction
{
    /**
     * @var DateTimeInterface|null
     */
    protected $date;

    /**
     * @return ?DateTimeInterface
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }
}
