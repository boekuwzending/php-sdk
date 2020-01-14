<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

use Boekuwzending\Exception\InvalidResourceArgumentException;

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
     * Item constructor.
     *
     * @param int         $quantity
     * @param string      $type
     * @param float       $length
     * @param float       $height
     * @param float       $width
     * @param float       $weight
     * @param string      $description
     * @param bool|null   $stackable
     * @param string|null $customerReference
     * @param float|null  $value
     * @param string|null $tariffNumber
     * @param string|null $countryOfOrigin
     *
     * @throws InvalidResourceArgumentException
     */
    public function __construct(
        int $quantity,
        string $type,
        float $length,
        float $height,
        float $width,
        float $weight,
        string $description,
        bool $stackable = null,
        string $customerReference = null,
        float $value = null,
        string $tariffNumber = null,
        string $countryOfOrigin = null
    ) {
        $this->quantity = $quantity;
        $this->type = $type;
        $this->stackable = $stackable;
        $this->length = $length;
        $this->height = $height;
        $this->width = $width;
        $this->description = $description;
        $this->customerReference = $customerReference;
        $this->value = $value;
        $this->tariffNumber = $tariffNumber;
        $this->countryOfOrigin = $countryOfOrigin;
        $this->weight = $weight;

        if (!in_array($this->type, self::VALID_TYPES, true)) {
            throw new InvalidResourceArgumentException(
                sprintf('Item type must be one of: %s', implode(', ', self::VALID_TYPES))
            );
        }

        if (!empty($this->description) && strlen($this->description) > 70) {
            throw new InvalidResourceArgumentException('Item description must be 70 characters or shorter.');
        }

        if (!empty($this->customerReference) && strlen($this->customerReference) > 35) {
            throw new InvalidResourceArgumentException('Item customerReference must be 35 characters or shorter.');
        }

        if (!empty($this->tariffNumber) && strlen($this->tariffNumber) > 35) {
            throw new InvalidResourceArgumentException('Item tariffNumber must be 35 characters or shorter.');
        }

        if (!empty($this->countryOfOrigin) && strlen($this->countryOfOrigin) > 2) {
            throw new InvalidResourceArgumentException('Item countryOfOrigin must be 2 characters or shorter.');
        }
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool|null
     */
    public function isStackable(): ?bool
    {
        return $this->stackable;
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
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
    public function getCustomerReference(): ?string
    {
        return $this->customerReference;
    }

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getTariffNumber(): ?string
    {
        return $this->tariffNumber;
    }

    /**
     * @return string|null
     */
    public function getCountryOfOrigin(): ?string
    {
        return $this->countryOfOrigin;
    }
}
