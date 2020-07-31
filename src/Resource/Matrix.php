<?php

namespace Boekuwzending\Resource;

class Matrix
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var MatrixRate[]
     */
    protected $rates = [];

    /**
     * @var Dimensions
     */
    protected $maxDimensions;

    /**
     * @var int
     */
    protected $maxWeight;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array|MatrixRate
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * @param array|MatrixRate $rates
     */
    public function setRates($rates): void
    {
        $this->rates = $rates;
    }

    /**
     * @return Dimensions
     */
    public function getMaxDimensions(): Dimensions
    {
        return $this->maxDimensions;
    }

    /**
     * @param Dimensions $maxDimensions
     */
    public function setMaxDimensions(Dimensions $maxDimensions): void
    {
        $this->maxDimensions = $maxDimensions;
    }

    /**
     * @return int
     */
    public function getMaxWeight(): int
    {
        return $this->maxWeight;
    }

    /**
     * @param int $maxWeight
     */
    public function setMaxWeight(int $maxWeight): void
    {
        $this->maxWeight = $maxWeight;
    }
}
