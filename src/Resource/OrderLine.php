<?php

namespace Boekuwzending\Resource;

/**
 * Class OrderLine
 */
class OrderLine {
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $externalId;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var Dimensions
     */
    protected $dimensions;

    /**
     * @var float
     */
    protected $weight;

    /**
     * @var float
     */
    protected $value;

    /**
     * @var string|null
     */
    protected $tariffNumber;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     */
    public function setExternalId(string $externalId): void
    {
        $this->externalId = $externalId;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
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
     * @return Dimensions
     */
    public function getDimensions(): Dimensions
    {
        return $this->dimensions;
    }

    /**
     * @param Dimensions $dimensions
     */
    public function setDimensions(Dimensions $dimensions): void
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string|null
     */
    public function getTariffNumber(): ?string
    {
        return $this->tariffNumber;
    }

    /**
     * @param string|null $tariffNumber
     */
    public function setTariffNumber(?string $tariffNumber): void
    {
        $this->tariffNumber = $tariffNumber;
    }
}