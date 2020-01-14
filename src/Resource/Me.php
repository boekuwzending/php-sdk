<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

/**
 * Class Me.
 */
class Me
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $name;

    /**
     * Me constructor.
     *
     * @param string $number
     * @param string $name
     */
    public function __construct(string $number, string $name)
    {
        $this->number = $number;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
