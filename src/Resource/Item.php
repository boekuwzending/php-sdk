<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

/**
 * Class Item.
 */
class Item
{
    public const TYPE_ENVELOP = 'envelop';
    public const TYPE_DOCUMENT = 'document';
    public const TYPE_PACKAGE = 'package';
    public const TYPE_PALLET_EURO = 'pallet-euro';
    public const TYPE_PALLET_BLOCK = 'pallet-block';
    public const TYPE_PALLET_MINI = 'pallet-mini';
    public const TYPE_PALLET_OTHER = 'pallet-other';
    private const VALID_TYPES = [
        self::TYPE_ENVELOP,
        self::TYPE_DOCUMENT,
        self::TYPE_PACKAGE,
        self::TYPE_PALLET_EURO,
        self::TYPE_PALLET_BLOCK,
        self::TYPE_PALLET_MINI,
        self::TYPE_PALLET_OTHER,
    ];

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var bool|null
     */
    protected $stackable;

    /**
     * @var float
     */
    protected $length;

    /**
     * @var float
     */
    protected $height;

    /**
     * @var float
     */
    protected $width;

    /**
     * @var float
     */
    protected $weight;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $customerReference;

    /**
     * @var float|null
     */
    protected $value;

    /**
     * @var string|null
     */
    protected $tariffNumber;

    /**
     * @var string|null
     */
    protected $countryOfOrigin;

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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return bool|null
     */
    public function isStackable(): ?bool
    {
        return $this->stackable;
    }

    /**
     * @param bool|null $stackable
     */
    public function setStackable(?bool $stackable): void
    {
        $this->stackable = $stackable;
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @param float $length
     */
    public function setLength(float $length): void
    {
        $this->length = $length;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth(float $width): void
    {
        $this->width = $width;
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
    public function getCustomerReference(): ?string
    {
        return $this->customerReference;
    }

    /**
     * @param string|null $customerReference
     */
    public function setCustomerReference(?string $customerReference): void
    {
        $this->customerReference = $customerReference;
    }

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float|null $value
     */
    public function setValue(?float $value): void
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

    /**
     * @return string|null
     */
    public function getCountryOfOrigin(): ?string
    {
        return $this->countryOfOrigin;
    }

    /**
     * @param string|null $countryOfOrigin
     */
    public function setCountryOfOrigin(?string $countryOfOrigin): void
    {
        $this->countryOfOrigin = $countryOfOrigin;
    }
}
