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
     * Tracking constructor.
     *
     * @param string $id
     * @param array  $lines
     *
     * @throws InvalidResourceArgumentException
     */
    public function __construct(string $id, array $lines)
    {
        foreach ($lines as $line) {
            if ($line instanceof TrackingLine === false) {
                throw new InvalidResourceArgumentException('Invalid tracking line found.');
            }
        }

        $this->id = $id;
        $this->lines = $lines;
    }
}
