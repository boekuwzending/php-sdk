<?php

namespace Boekuwzending\Resource;

/**
 * Class Service
 */
class Service
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $pickupPoint = false;

    /**
     * @var string
     */
    protected $distributorIdentifier;

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
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
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
     * @return bool
     */
    public function isPickupPoint(): bool
    {
        return $this->pickupPoint;
    }

    /**
     * @param bool $pickupPoint
     */
    public function setPickupPoint(bool $pickupPoint): void
    {
        $this->pickupPoint = $pickupPoint;
    }

    /**
     * @return string
     */
    public function getDistributorIdentifier(): string
    {
        return $this->distributorIdentifier;
    }

    /**
     * @param string $distributorIdentifier
     */
    public function setDistributorIdentifier(string $distributorIdentifier): void
    {
        $this->distributorIdentifier = $distributorIdentifier;
    }
}