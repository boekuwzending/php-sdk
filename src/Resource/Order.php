<?php

namespace Boekuwzending\Resource;

use DateTime;

/**
 * Class Order
 */
class Order
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $externalId;

    /**
     * @var string|null
     */
    protected $reference;

    /**
     * @var DateTime
     */
    protected $createdAtSource;

    /**
     * @var OrderLine[]
     */
    protected $orderLines;

    /**
     * @var Contact
     */
    protected $shipToContact;

    /**
     * @var Address
     */
    protected $shipToAddress;

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
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
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAtSource(): DateTime
    {
        return $this->createdAtSource;
    }

    /**
     * @param DateTime $createdAtSource
     */
    public function setCreatedAtSource(DateTime $createdAtSource): void
    {
        $this->createdAtSource = $createdAtSource;
    }

    /**
     * @return OrderLine[]
     */
    public function getOrderLines(): array
    {
        return $this->orderLines;
    }

    /**
     * @param OrderLine[] $orderLines
     */
    public function setOrderLines(array $orderLines): void
    {
        $this->orderLines = $orderLines;
    }

    /**
     * @return Contact
     */
    public function getShipToContact(): Contact
    {
        return $this->shipToContact;
    }

    /**
     * @param Contact $shipToContact
     */
    public function setShipToContact(Contact $shipToContact): void
    {
        $this->shipToContact = $shipToContact;
    }

    /**
     * @return Address
     */
    public function getShipToAddress(): Address
    {
        return $this->shipToAddress;
    }

    /**
     * @param Address $shipToAddress
     */
    public function setShipToAddress(Address $shipToAddress): void
    {
        $this->shipToAddress = $shipToAddress;
    }
}