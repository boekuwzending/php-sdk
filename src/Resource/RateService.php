<?php

namespace Boekuwzending\Resource;

/**
 * Class RateService
 */
class RateService
{
    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $code;

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
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }
}