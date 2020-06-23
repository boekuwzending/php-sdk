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
     * @var string
     */
    private $id;

    /**
     * Me constructor.
     *
     * @param string $number
     * @param string $name
     * @param string $id
     */
    public function __construct(string $number, string $name, string $id)
    {
        $this->number = $number;
        $this->name = $name;
        $this->id = $id;
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

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
