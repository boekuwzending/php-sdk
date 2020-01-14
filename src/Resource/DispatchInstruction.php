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
     * @var DateTimeInterface
     */
    protected $date;

    /**
     * DispatchInstruction constructor.
     *
     * @param DateTimeInterface      $date
     * @param string|null            $instructions
     * @param string|null            $reference
     * @param DateTimeInterface|null $timeWindowBegin
     * @param DateTimeInterface|null $timeWindowEnd
     *
     * @throws InvalidResourceArgumentException
     */
    public function __construct(
        DateTimeInterface $date,
        string $instructions = null,
        string $reference = null,
        DateTimeInterface $timeWindowBegin = null,
        DateTimeInterface $timeWindowEnd = null
    ) {
        parent::__construct($instructions, $reference, $timeWindowBegin, $timeWindowEnd);

        $this->date = $date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }
}
