<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

use Boekuwzending\Exception\InvalidResourceArgumentException;

/**
 * Class Tracking.
 */
class Tracking
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var TrackingLine[]
     */
    protected $lines;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return TrackingLine[]
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * @param TrackingLine[] $lines
     */
    public function setLines(array $lines): void
    {
        $this->lines = $lines;
    }
}
