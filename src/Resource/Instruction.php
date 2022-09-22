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
     * @var string|null
     */
    protected $vatNumber;

    /**
     * @var string|null
     */
    protected $eoriNumber;

    /**
     * @return string|null
     */
    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    /**
     * @param string|null $instructions
     */
    public function setInstructions(?string $instructions): void
    {
        $this->instructions = $instructions;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getTimeWindowBegin(): ?DateTimeInterface
    {
        return $this->timeWindowBegin;
    }

    /**
     * @param DateTimeInterface|null $timeWindowBegin
     */
    public function setTimeWindowBegin(?DateTimeInterface $timeWindowBegin): void
    {
        $this->timeWindowBegin = $timeWindowBegin;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getTimeWindowEnd(): ?DateTimeInterface
    {
        return $this->timeWindowEnd;
    }

    /**
     * @param DateTimeInterface|null $timeWindowEnd
     */
    public function setTimeWindowEnd(?DateTimeInterface $timeWindowEnd): void
    {
        $this->timeWindowEnd = $timeWindowEnd;
    }

    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    public function setVatNumber(?string $vatNumber): void
    {
        $this->vatNumber = $vatNumber;
    }

    public function getEoriNumber(): ?string
    {
        return $this->eoriNumber;
    }

    public function setEoriNumber(?string $eoriNumber): void
    {
        $this->eoriNumber = $eoriNumber;
    }
}
