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
     * TrackingLine constructor.
     *
     * @param string                 $status
     * @param string                 $description
     * @param string                 $location
     * @param DateTimeInterface|null $dateTime
     */
    public function __construct(string $status, string $description, ?string $location, ?DateTimeInterface $dateTime)
    {
        $this->status = $status;
        $this->description = $description;
        $this->location = $location;
        $this->dateTime = $dateTime;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateTime(): ?DateTimeInterface
    {
        return $this->dateTime;
    }
}
