<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

use Boekuwzending\Exception\InvalidResourceArgumentException;
use DateTimeInterface;

/**
 * Class DispatchInstruction.
 */
class DeliveryInstruction extends Instruction
{
    /**
     * @var DateTimeInterface|null
     */
    protected $date;

    /**
     * DeliveryInstruction constructor.
     *
     * @param DateTimeInterface|null $date
     * @param string|null            $instructions
     * @param string|null            $reference
     * @param DateTimeInterface|null $timeWindowBegin
     * @param DateTimeInterface|null $timeWindowEnd
     *
     * @throws InvalidResourceArgumentException
     */
    public function __construct(
        DateTimeInterface $date = null,
        string $instructions = null,
        string $reference = null,
        DateTimeInterface $timeWindowBegin = null,
        DateTimeInterface $timeWindowEnd = null
    ) {
        parent::__construct($instructions, $reference, $timeWindowBegin, $timeWindowEnd);

        $this->date = $date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }
}
