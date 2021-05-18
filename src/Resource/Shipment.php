<?php

namespace Boekuwzending\Resource;

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
    protected $id;

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
     * @var Contact|null
     */
    protected $shipFromContact;

    /**
     * @var Address|null
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
     * @var string|null
     */
    protected $dpdPickupBy;

    /**
     * @var DispatchInstruction
     */
    protected $dispatch;

    /**
     * @var DeliveryInstruction|null
     */
    protected $delivery;

    /**
     * @var Item[]
     */
    protected $items = [];

    /**
     * @var string|null
     */
    protected $sequence;

    /**
     * @var string|null
     */
    protected $service;

    /**
     * @var array
     */
    protected $labels = [];

    /**
     * @var string|null
     */
    protected $status;

    /**
     * @var string|Shipment|null
     */
    protected $related;

    /**
     * @var PickupPoint|null
     */
    protected $pickupPoint;

    /**
     * @var string|null
     */
    protected $labelPdfData;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getInvoiceReference(): ?string
    {
        return $this->invoiceReference;
    }

    /**
     * @param string|null $invoiceReference
     */
    public function setInvoiceReference(?string $invoiceReference): void
    {
        $this->invoiceReference = $invoiceReference;
    }

    /**
     * @return string
     */
    public function getTransportType(): ?string
    {
        return $this->transportType;
    }

    /**
     * @param string $transportType
     */
    public function setTransportType(string $transportType): void
    {
        $this->transportType = $transportType;
    }

    /**
     * @return string|null
     */
    public function getIncoTerms(): ?string
    {
        return $this->incoTerms;
    }

    /**
     * @param string|null $incoTerms
     */
    public function setIncoTerms(?string $incoTerms): void
    {
        $this->incoTerms = $incoTerms;
    }

    /**
     * @return Contact|null
     */
    public function getShipFromContact(): ?Contact
    {
        return $this->shipFromContact;
    }

    /**
     * @param Contact|null $shipFromContact
     */
    public function setShipFromContact(?Contact $shipFromContact): void
    {
        $this->shipFromContact = $shipFromContact;
    }

    /**
     * @return Address|null
     */
    public function getShipFromAddress(): ?Address
    {
        return $this->shipFromAddress;
    }

    /**
     * @param Address|null $shipFromAddress
     */
    public function setShipFromAddress(?Address $shipFromAddress): void
    {
        $this->shipFromAddress = $shipFromAddress;
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

    /**
     * @return string|null
     */
    public function getDpdNumber(): ?string
    {
        return $this->dpdNumber;
    }

    /**
     * @param string|null $dpdNumber
     */
    public function setDpdNumber(?string $dpdNumber): void
    {
        $this->dpdNumber = $dpdNumber;
    }

    /**
     * @return string|null
     */
    public function getDpdDepotCode(): ?string
    {
        return $this->dpdDepotCode;
    }

    /**
     * @param string|null $dpdDepotCode
     */
    public function setDpdDepotCode(?string $dpdDepotCode): void
    {
        $this->dpdDepotCode = $dpdDepotCode;
    }

    /**
     * @return DispatchInstruction
     */
    public function getDispatch(): DispatchInstruction
    {
        return $this->dispatch;
    }

    /**
     * @param DispatchInstruction $dispatch
     */
    public function setDispatch(DispatchInstruction $dispatch): void
    {
        $this->dispatch = $dispatch;
    }

    /**
     * @return DeliveryInstruction|null
     */
    public function getDelivery(): ?DeliveryInstruction
    {
        return $this->delivery;
    }

    /**
     * @param DeliveryInstruction|null $delivery
     */
    public function setDelivery(?DeliveryInstruction $delivery): void
    {
        $this->delivery = $delivery;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @param Item $item
     */
    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return string|null
     */
    public function getSequence(): ?string
    {
        return $this->sequence;
    }

    /**
     * @param string|null $sequence
     */
    public function setSequence(?string $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return string|null
     */
    public function getService(): ?string
    {
        return $this->service;
    }

    /**
     * @param string|null $service
     */
    public function setService(?string $service): void
    {
        $this->service = $service;
    }

    /**
     * @return array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     */
    public function setLabels(array $labels): void
    {
        $this->labels = $labels;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getRelated(): ?string
    {
        return $this->related;
    }

    /**
     * @param string|Shipment|null
     */
    public function setRelated($shipment): void
    {
        $id = null;

        if (null === $shipment) {
            $this->related = null;
            return;
        }

        if ($shipment instanceof self) {
            $id = $shipment->getId();
        } else {
            $id = $shipment;
        }

        $this->related = sprintf('/shipments/%s', $id);
    }

    /**
     * @return PickupPoint|null
     */
    public function getPickupPoint(): ?PickupPoint
    {
        return $this->pickupPoint;
    }

    /**
     * @param PickupPoint|null $pickupPoint
     */
    public function setPickupPoint(?PickupPoint $pickupPoint): void
    {
        $this->pickupPoint = $pickupPoint;
    }

    /**
     * @return string|null
     */
    public function getDpdPickupBy(): ?string
    {
        return $this->dpdPickupBy;
    }

    /**
     * @param string|null $dpdPickupBy
     */
    public function setDpdPickupBy(?string $dpdPickupBy): void
    {
        $this->dpdPickupBy = $dpdPickupBy;
    }

    /**
     * @return string|null
     */
    public function getLabelPdfData(): ?string
    {
        return $this->labelPdfData;
    }

    /**
     * @param string|null $labelPdfData
     */
    public function setLabelPdfData(?string $labelPdfData): void
    {
        $this->labelPdfData = $labelPdfData;
    }
}
