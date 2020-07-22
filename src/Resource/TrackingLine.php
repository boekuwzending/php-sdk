<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

use DateTimeInterface;

/**
 * Class TrackingLine.
 */
class TrackingLine
{
    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $location;

    /**
     * @var DateTimeInterface|null
     */
    protected $dateTime;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string|null $location
     */
    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateTime(): ?DateTimeInterface
    {
        return $this->dateTime;
    }

    /**
     * @param DateTimeInterface|null $dateTime
     */
    public function setDateTime(?DateTimeInterface $dateTime): void
    {
        $this->dateTime = $dateTime;
    }
}
