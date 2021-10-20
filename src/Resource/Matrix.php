<?php

namespace Boekuwzending\Resource;

/**
 * Class Matrix
 */
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
     * @return MatrixRate[]
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * @param MatrixRate[] $rates
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
     * @return float|null
     */
    public function getMaxWeight(): ?float
    {
        return $this->maxWeight;
    }

    /**
     * @param float|null $maxWeight
     */
    public function setMaxWeight(?float $maxWeight): void
    {
        $this->maxWeight = $maxWeight;
    }
}
