<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

use Boekuwzending\Exception\InvalidResourceArgumentException;
use DateTimeInterface;

/**
 * Class Instruction.
 */
abstract class Instruction
{
    /**
     * @var string|null
     */
    protected $instructions;

    /**
     * @var string|null
     */
    protected $reference;

    /**
     * @var DateTimeInterface|null
     */
    protected $timeWindowBegin;

    /**
     * @var DateTimeInterface|null
     */
    protected $timeWindowEnd;

    /**
     * Instruction constructor.
     *
     * @param string|null            $instructions
     * @param string|null            $reference
     * @param DateTimeInterface|null $timeWindowBegin
     * @param DateTimeInterface|null $timeWindowEnd
     *
     * @throws InvalidResourceArgumentException
     */
    public function __construct(
        ?string $instructions,
        ?string $reference,
        ?DateTimeInterface $timeWindowBegin,
        ?DateTimeInterface $timeWindowEnd
    ) {
        $this->instructions = $instructions;
        $this->reference = $reference;
        $this->timeWindowBegin = $timeWindowBegin;
        $this->timeWindowEnd = $timeWindowEnd;

        if (!empty($this->instructions) && strlen($this->instructions) > 75) {
            throw new InvalidResourceArgumentException('Dispatch and delivery instructions street must be 75 characters or shorter.');
        }

        if (!empty($this->reference) && strlen($this->reference) > 75) {
            throw new InvalidResourceArgumentException('Dispatch and delivery reference street must be 75 characters or shorter.');
        }
    }

    /**
     * @return string|null
     */
    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getTimeWindowBegin(): ?DateTimeInterface
    {
        return $this->timeWindowBegin;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getTimeWindowEnd(): ?DateTimeInterface
    {
        return $this->timeWindowEnd;
    }
}
