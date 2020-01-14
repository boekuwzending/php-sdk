<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

use Boekuwzending\Exception\InvalidResourceArgumentException;

/**
 * Class ShipmentMessage.
 */
class Shipment
{
    public const INCO_TERMS_DELIVERY_AT_PLACE = 'DAP';
    public const INCO_TERMS_DELIVERY_DUTY_PAID = 'DDP';
    private const VALID_INCO_TERMS = [
        self::INCO_TERMS_DELIVERY_AT_PLACE,
        self::INCO_TERMS_DELIVERY_DUTY_PAID,
    ];

    public const TRANSPORT_TYPE_ROAD = 'road_transport';
    public const TRANSPORT_TYPE_SEA = 'sea_freight';
    public const TRANSPORT_TYPE_AIR = 'air_freight';
    private const VALID_TRANSPORT_TYPES = [
        self::TRANSPORT_TYPE_ROAD,
        self::TRANSPORT_TYPE_SEA,
        self::TRANSPORT_TYPE_AIR,
    ];

    /**
     * @var string|null
     */
    protected $invoiceReference;

    /**
     * @var string
     */
    protected $transportType;

    /**
     * @var string|null
     */
    protected $incoTerms;

    /**
     * @var Contact
     */
    protected $shipFromContact;

    /**
     * @var Address
     */
    protected $shipFromAddress;

    /**
     * @var Contact
     */
    protected $shipToContact;

    /**
     * @var Address
     */
    protected $shipToAddress;

    /**
     * @var string|null
     */
    protected $dpdNumber;

    /**
     * @var string|null
     */
    protected $dpdDepotCode;

    /**
     * @var DispatchInstruction
     */
    protected $dispatch;

    /**
     * @var DeliveryInstruction
     */
    protected $delivery;

    /**
     * @var Item[]
     */
    protected $items;

    /**
     * Shipment constructor.
     *
     * @param string              $transportType
     * @param Contact             $shipFromContact
     * @param Address             $shipFromAddress
     * @param Contact             $shipToContact
     * @param Address             $shipToAddress
     * @param DispatchInstruction $dispatch
     * @param DeliveryInstruction $delivery
     * @param array               $items
     * @param string|null         $invoiceReference
     * @param string|null         $incoTerms
     * @param string|null         $dpdNumber
     * @param string|null         $dpdDepotCode
     *
     * @throws InvalidResourceArgumentException
     */
    public function __construct(
        string $transportType,
        Contact $shipFromContact,
        Address $shipFromAddress,
        Contact $shipToContact,
        Address $shipToAddress,
        DispatchInstruction $dispatch,
        DeliveryInstruction $delivery,
        array $items,
        string $invoiceReference = null,
        string $incoTerms = null,
        string $dpdNumber = null,
        string $dpdDepotCode = null
    ) {
        $this->invoiceReference = $invoiceReference;
        $this->transportType = strtolower($transportType);
        $this->incoTerms = $incoTerms ? strtolower($incoTerms) : null;
        $this->shipFromContact = $shipFromContact;
        $this->shipFromAddress = $shipFromAddress;
        $this->shipToContact = $shipToContact;
        $this->shipToAddress = $shipToAddress;
        $this->dispatch = $dispatch;
        $this->delivery = $delivery;
        $this->items = $items;
        $this->dpdNumber = $dpdNumber;
        $this->dpdDepotCode = $dpdDepotCode;

        if (strlen($this->invoiceReference) > 35) {
            throw new InvalidResourceArgumentException('InvoiceReference must be 35 characters or shorter.');
        }

        if (!in_array($this->transportType, self::VALID_TRANSPORT_TYPES, true)) {
            throw new InvalidResourceArgumentException(
                sprintf('TransportType must be one of: %s', implode(', ', self::VALID_TRANSPORT_TYPES))
            );
        }

        if (!empty($this->incoTerms) && !in_array($this->incoTerms, self::VALID_INCO_TERMS, true)) {
            throw new InvalidResourceArgumentException(
                sprintf('IncoTerms must be one of: %s', implode(', ', self::VALID_INCO_TERMS))
            );
        }

        if (!empty($this->dpdNumber) && strlen($this->dpdNumber) > 17) {
            throw new InvalidResourceArgumentException('DpdNumber must be 17 characters or shorter.');
        }
    }

    /**
     * @return string|null
     */
    public function getInvoiceReference(): ?string
    {
        return $this->invoiceReference;
    }

    /**
     * @return string
     */
    public function getTransportType(): string
    {
        return $this->transportType;
    }

    /**
     * @return string|null
     */
    public function getIncoTerms(): ?string
    {
        return $this->incoTerms;
    }

    /**
     * @return Contact
     */
    public function getShipFromContact(): Contact
    {
        return $this->shipFromContact;
    }

    /**
     * @return Address
     */
    public function getShipFromAddress(): Address
    {
        return $this->shipFromAddress;
    }

    /**
     * @return Contact
     */
    public function getShipToContact(): Contact
    {
        return $this->shipToContact;
    }

    /**
     * @return Address
     */
    public function getShipToAddress(): Address
    {
        return $this->shipToAddress;
    }

    /**
     * @return DispatchInstruction
     */
    public function getDispatch(): DispatchInstruction
    {
        return $this->dispatch;
    }

    /**
     * @return DeliveryInstruction
     */
    public function getDelivery(): DeliveryInstruction
    {
        return $this->delivery;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return string|null
     */
    public function getDpdNumber(): ?string
    {
        return $this->dpdNumber;
    }

    /**
     * @return string|null
     */
    public function getDpdDepotCode(): ?string
    {
        return $this->dpdDepotCode;
    }
}
